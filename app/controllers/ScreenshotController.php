<?php

class ScreenshotController extends BaseController {

	public function index()
	{
		$screenshots = DB::table('screenshots')
		->orderBy('created_at', 'desc')
		->paginate(6);

		

		return View::make('screenshots.index', compact('screenshots'));
	}

	public function create()
	{
		$categories = CategorieType::lists('title');

		return View::make('screenshots.create', compact('categories'));
	}


	public function store()
	{

		$rules = array(
			'title'		=> 'required',
			'team'   	=> 'required',
			'qualite'   => 'required',
			'categorie' => 'required',
			'file'		=> 'required',
			'time'  	=> 'required',
			'karaokes' 	=> 'required'
			);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('screenshot/create')
			->withErrors($validator)
			->withInput(Input::except('license_file'));
		} 
		else {

			$file = Input::file('file');
			$destinationPath = 'public/images/screenshots';
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension(); 
			$type = $file->getMimeType();
			$size = Input::file('file')->getSize();

			$screenshot = new Screenshot;

			if (Title::find('title') == Input::get('title')) {
				$screenshot->title  	= Input::get('title');
				$screenshot->title_id  	= Title::find($id);
			}

			else if (Title::find('title') != Input::get('title')) {
				$title = new Title;
				$title->title  			= Input::get('title');
				$title->save();

				$screenshot->title  	= Input::get('title');
				$screenshot->title_id  	= Title::where('title', '=', Input::get('title'))->first('id');
			}

			if (Team::find('name') == Input::get('team')) {
				$screenshot->team  			= Input::get('team');
				$screenshot->team_id  		= Team::find($id);
			}

			else if (Team::find('title') != Input::get('team')) {
				$team = new Team;
				$team->name  			= Input::get('team');
				$team->save();

				$screenshot->team  	= Input::get('team');
				$screenshot->team  	= Team::where('name', '=', Input::get('team'))->first('id');
			}

			$screenshot->qualite 		= Input::get('qualite');
			$screenshot->user_id 		= Auth::user()->id;
			$screenshot->username 		= Auth::user()->username;
			$screenshot->categorie      = Input::get('categorie');
			$screenshot->type   		= $type;
			$screenshot->censure      	= Input::get('censure');
			$screenshot->karaokes      	= Input::get('karaokes');
			$screenshot->url      		= 'images/screenshots' . '/' . $filename . '.' . $extension;
			$screenshot->size      		= $size;
			$screenshot->extension      = $extension;

			$upload_success = Input::file('file')->move($destinationPath, $filename . '.' . $extension);

			if ($upload_success) {
				$screenshot->save();
			}

			return Redirect::to('')->with('success', 'Votre screenshot a bien été ajouté.');
		}
	}


	public function show($id)
	{
		$screenshot = Screenshot::find($id);


		$user = DB::table('users')
		->where('username', '=', $screenshot->username)
		->first();

		return View::make('screenshots.show', compact('sortie', 'user'));
	}


	public function edit($id)
	{

		$screenshot = Sortie::find($id);

		if ($screenshot) 
		{
			return View::make('screenshots.edit')
			->with('sortie', $screenshot);
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
			$screenshot = Sortie::find($id);
			$screenshot->title  		= Input::get('title');
			$screenshot->qualite 		= Input::get('qualite');
			$screenshot->description 	= Input::get('description');
			$screenshot->categorie      = Input::get('categorie');
			$screenshot->origine	    = Input::get('origine');
			$screenshot->type   		= Input::get('type');
			$screenshot->access      	= Input::get('access');
			$screenshot->censure      	= Input::get('censure');
			$screenshot->karaokes      	= Input::get('karaokes');
			$screenshot->save();


			return Redirect::to('')->with('success', 'Votre annonce de sortie a bien été mise à jour.');
		}
	}


	public function destroy($id)
	{

		$screenshot = Sortie::find($id);
		$path = $screenshot->url;

		File::delete(public_path() . '/' . $path);
		$screenshot->delete();

		return Redirect::to('/admin')->with('success', 'Fichier supprimé.');
	}



	public function postSearch()
	{
		$results = DB::table('screenshots');

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

		return View::make('screenshots.search', compact('results'));
	}



	public function admin()
	{
		$screenshots = Sortie::all();
		return View::make('screenshots.admin', compact('screenshots'));
	}





}