<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', ['uses'=>'AforismeController@index', 'as'=>'home']);
Route::get('/user/{user}', ['uses'=>'AforismeController@index', 'as'=>'home-user']);
Route::get('/etichete/{slug}', ['uses'=>'AforismeController@index', 'as'=>'home-slug']);



Route::get('/home', 'HomeController@index');

Route::get('auth/facebook', [ 'uses' => 'Auth\AuthController@redirectToProvider','as' =>'facebook']);
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');


// Sectiunea pentru inserare/modificare aforisme, taguri======================================================================================================
Route::group(['namespace' => 'Admin'], function () {
	Route::resource('/admin/aforisme', 'AforismController', ['except' => 'show']);
	Route::resource('/admin/etichete', 'TagController', ['parameters' => ['etichete' => 'slug']], ['except' => 'show']);
});
// Sfârșit secțiunea pentru inserare/modificare aforisme, taguri==============================================================================================

// Secțiunea pentru adăugat favorite =============================================================================================================================
Route::post('favorites/store', ['uses' => 'AforismeController@adaugaFavorit', 'as' => 'favorites.store', 'middleware'=>'auth' ]);
Route::post('favorites/{aforismId}', ['uses' => 'AforismeController@eliminaFavorit', 'as' => 'favorites.destroy', 'middleware'=>'auth' ]);

