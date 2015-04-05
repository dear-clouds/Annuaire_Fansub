<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@showIndex');
Route::get('login', array('as' => 'login', 'uses' => 'UserController@showLogin'));
Route::post('login', 'UserController@postLogin');
Route::get('logout', 'UserController@getLogout');
Route::get('account/activate/{code}', array('as' => 'account-activate', 'uses' => "UserController@getActivate"));
Route::get('register', 'UserController@create');
Route::resource('user', 'UserController');


// Filtre connexion
Route::group(array('before' => 'auth'), function() 
{

	Route::resource('message', 'MessageController');
	Route::resource('upload', 'UploadController');
	Route::resource('sortie', 'SortieController');
	Route::resource('screenshot', 'ScreenshotController');
	Route::get('profile', 'UserController@profile');
	Route::get('profil/{username}', 'UserController@show');

	Route::post(
    'annonce/search', 
    array(
        'as' => 'annonce.search', 
        'uses' => 'AnnonceController@postSearch'
    )
    
);
	
});


// Filtre Admin
Route::group(array('before' => 'admin'), function() 
{
	Route::get('admin', 'IndexController@showAdmin');
	Route::get('admin/users', 'UserController@index');
	
});