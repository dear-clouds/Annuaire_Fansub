<?php

class SortieController extends BaseController {

	public function index()
	{
		$sorties = DB::table('sorties')
		->orderBy('created_at', 'desc')
		->paginate(6);

		

		return View::make('sorties.index', compact('sorties'));
	}

	public function create()
	{
		$categories = CategorieType::lists('title');
		
		return View::make('sorties.create', compact('categories'));
	}


	public function store()
	{

		$rules = array(
			'title'   => 'required',
			'description'      => 'required',
			'qualite'   => 'required',
			'categorie' => 'required',
			'file'	=> 'required',
			'size'  => '',
			'type'	=> ''
			);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('sortie/create')
			->withErrors($validator)
			->withInput(Input::except('license_file'));
		} else {


			$sortie = new Sortie;
			$sortie->title  		= Input::get('title');
			$sortie->qualite 		= Input::get('qualite');
			$sortie->description 	= Input::get('description');
			$sortie->user_id 		= Auth::user()->id;
			$sortie->username 		= Auth::user()->username;
			$sortie->team 			= Auth::user()->team;
			$sortie->categorie      = Input::get('categorie');
			$sortie->origine	    = Input::get('origine');
			$sortie->type   		= Input::get('type');
			$sortie->access      	= Input::get('access');
			$sortie->censure      	= Input::get('censure');
			$sortie->karaokes      	= Input::get('karaokes');
			$sortie->save();
			
			// $id = Sortie::last($id);
			$file = Input::file('file');
			$destinationPath = 'public/images/sorties';
			$filename = str_random(20);
			// $filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension(); 
			$type = $file->getMimeType();
			$size = Input::file('file')->getSize();
			$upload_success = Input::file('file')->move($destinationPath, $filename . '.' . $extension);

			if( $upload_success ) {
				Image::create(['name'       => $filename,
					'user_id'    => Auth::user()->id,
					'sortie_id'  => $sortie->id,
					'username'    => Auth::user()->username,
					'url'        => 'images/sorties' . '/' . $filename . '.' . $extension,
					'size'			=> $size,
					'extension'   => $file->getClientOriginalExtension(),
					'type'		=> $type
					]);
			}

			return Redirect::to('')->with('success', 'Votre sortie a bien été postée.');
		}
	}


	public function show($id)
	{
		$sortie = Sortie::find($id);


		$user = DB::table('users')
		->where('username', '=', $sortie->username)
		->first();
		
		$image = Image::join('sorties', 'sorties.id', '=', 'images.sortie_id')->first();

		return View::make('sorties.show', compact('sortie', 'user', 'image'));
	}


	public function edit($id)
	{

		$sortie = Sortie::find($id);

		if ($sortie) 
		{
			return View::make('sorties.edit')
			->with('sortie', $sortie);
		}

		else
		{
			return Redirect::to('')->with('error', 'Vous ne pouvez pas faire ça.');
		}
	}


	public function update($id)
	{
		$rules = array(
			'title'   => 'required',
			'description'      => 'required',
			'qualite'   => 'required',
			'categorie' => 'required',
			'size'  => 'max:10000000'
			);
		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
			return Redirect::to('sortie/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} 
		else 
		{
			$sortie = Sortie::find($id);
			$sortie->title  		= Input::get('title');
			$sortie->qualite 		= Input::get('qualite');
			$sortie->description 	= Input::get('description');
			$sortie->categorie      = Input::get('categorie');
			$sortie->origine	    = Input::get('origine');
			$sortie->type   		= Input::get('type');
			$sortie->access      	= Input::get('access');
			$sortie->censure      	= Input::get('censure');
			$sortie->karaokes      	= Input::get('karaokes');
			$sortie->save();


			return Redirect::to('')->with('success', 'Votre annonce de sortie a bien été mise à jour.');
		}
	}


	public function destroy($id)
	{

		$sortie = Sortie::find($id);
		$path = $sortie->url;

		File::delete(public_path() . '/' . $path);
		$sortie->delete();

		return Redirect::to('/admin')->with('success', 'Fichier supprimé.');
	}



	public function postSearch()
	{
		$results = DB::table('sorties');

		if(Input::get('keywords'))
			$results->where('title', 'LIKE', '%' . Input::get('keywords') . '%')
		->orWhere('description', 'LIKE', '%' . Input::get('keywords') . '%');

		if(Input::get('categorie'))
			$results->where('categorie', '=', Input::get('categorie'));

		if(Input::get('departement'))
			$results->where('departement', 'LIKE', '%' . Input::get('departement') . '%');

		if(Input::get('price'))
			$results->where('price', '<=', Input::get('price'));

		$results = $results->get();

    // $keyword = Input::get('keywords');
    // $categorie = Input::get('categorie');
    // $departement = Input::get('departement');
    // $price = Input::get('price');

    // $query = DB::table('annonces')
    // 		->where('title', 'LIKE', "%{$keyword}%")
    //         ->orWhere('description', 'LIKE', "%{$keyword}%");
    //         // ->orWhere('departement', 'LIKE', "%{$departement}%")
    //         // ->orWhere('price', 'LIKE', "%{$price}%")
    //         // ->orWhere('categorie', 'LIKE', "%{$categorie}%");

    // $results = $query->get();

		return View::make('sorties.search', compact('results'));
	}



	public function admin()
	{
		$sorties = Sortie::all();
		return View::make('sorties.admin', compact('sorties'));
	}





}