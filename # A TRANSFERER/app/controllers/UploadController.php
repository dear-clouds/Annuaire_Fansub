<?php

class UploadController extends BaseController {

	public function index()
	{
		$uploads = DB::table('uploads')
		->orderBy('created_at', 'desc')
		->paginate(8);

		// $username = Upload::find($user_id)
  	//                   ->join('users', 'uploads.user_id', '=', 'users.id')
  	//                   ->get();

		// $username = DB::table('uploads')
		// ->join('users', 'uploads.user_id', '=', 'users.id')
		// ->select('users.username')
		// ->get();

		return View::make('upload.index', compact('uploads', 'username'));
	}

	public function store()
	{

		$rules = array(
			'file'	=> 'required|max:10000000',
			'name'  => 'unique:uploads',
			'size'  => 'max:10000000',
			'type'	=> 'image/jpeg,image/png,image/gif'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('')
			->withErrors($validator)
			->withInput(Input::except('license_file'));
		} 

		else 
		{

			$file = Input::file('file');
			$destinationPath = 'public/uploads/' . Auth::user()->username;
			$filename = str_random(20);
			// $filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension(); 
			$type = $file->getMimeType();
			$size = Input::file('file')->getSize();
			$upload_success = Input::file('file')->move($destinationPath, $filename . '.' . $extension);

			Upload::create(['name'       => $filename,
				'user_id'    => Auth::user()->id,
				'username'    => Auth::user()->username,
				'url'        => 'uploads/' . Auth::user()->username . '/' . $filename . '.' . $extension,
				'size'			=> $size,
				'description'   => Input::get('description'),
				'extension'   => $file->getClientOriginalExtension(),
				'type'		=> $type
				]);

			return Redirect::to('profile')->with('success', 'Votre fichier a bien été uploadé.');
		}



		// if (Input::hasFile('file'))
		// {
		// 	$file = Input::file('file');
		// 	$destinationPath = 'public/uploads';
		// 	$filename = str_random(20);
		// 	// $filename = $file->getClientOriginalName();
		// 	$extension = $file->getClientOriginalExtension(); 
		// 	$size = Input::file('file')->getSize();
		// 	$upload_success = Input::file('file')->move($destinationPath, $filename . '.' . $extension);

		// 	$upload = Upload::create(['name'       => $filename,
		// 	'user_id'    => Auth::user()->id,
		// 	'url'        => 'uploads/' . $filename . '.' . $extension,
		// 	'size'			=> $size,
		// 	'description'   => Input::get('description'),
		// 	'extension'   => $file->getClientOriginalExtension()
		// 	]);
		// }

		// if ($upload)
		// {
		// 	return Redirect::to('')->with('success', 'Votre fichier a bien été uploadé.');
		// }




		// if ($size > 52428800)
		// {
		// 	return Redirect::to('')->withErrors('Votre fichier est trop gros.');
		// }



		// else 
		// {
		// 	return Redirect::to('')->withErrors('Votre fichier n\'a pas pu être uploadé.');
		// }
	}


	public function show($id)
	{
		$upload = Upload::find($id);

		return View::make('upload.show')
		->with('upload', $upload);
	}


	public function edit($id)
	{

		$upload = Upload::find($id);

		if ($upload) 
		{
			return View::make('upload.edit')
			->with('upload', $upload);
		}

		else
		{
			return Redirect::to('')->with('error', 'Vous ne pouvez pas faire ça.');
		}
	}


	public function update($id)
	{
		$rules = array(
			'name'       => 'required|unique:uploads',
			'description'      => ''
			);
		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
			return Redirect::to('upload/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} 
		else 
		{
			$upload = Upload::find($id);
			$upload->name       	= Input::get('name');
			$upload->description      = Input::get('description');
			$upload->save();

			return Redirect::to('profile')->with('success', 'Votre fichier a bien été mis à jour.');
		}
	}


	public function destroy($id)
	{

		$upload = Upload::find($id);
		$path = $upload->url;

		File::delete(public_path() . '/' . $path);
		$upload->delete();

		return Redirect::to('profile')->with('success', 'Fichier supprimé.');
	}



	public function addFolder()
	{
		$path = public_path() . '/uploads/' . Auth::user()->username . '/' . Input::get('dossier');
		File::makeDirectory($path);

		return Redirect::to('profile')->with('success', 'Dossier créé.');
	}


	public function deleteFolder()
	{

	}




}