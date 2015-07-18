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

Route::get('/', function () {
    return view('welcome');
});

// routes for auth
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('password/forgot', ['as' => 'auth.forgot', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/forgot', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', ['as' => 'auth.reset', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset/{token}', 'Auth\PasswordController@postReset');


Route::get('admin', ['middleware' => ['auth', 'admin'], function () {
	$user = Auth::user();
	$user = array_except($user, ['created_at', 'updated_at']);
	if (Auth::user()->hasGroup('admin')) {
		$customClaims = ['group' => 'admin'];
    	$token = JWTAuth::fromUser($user, $customClaims);
	}
    return view('admin', compact('token'));
}]);


Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
Route::get('categories/{slug}', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
Route::get('{slug}', ['as' => 'content.show', 'uses' => 'ContentsController@show']);



//include api routes
require __DIR__.'/api.php';
