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

//include api routes
require __DIR__.'/auth.php';

//include admin routes
require __DIR__.'/admin.php';

//include api routes
require __DIR__.'/api.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
Route::get('categories/{slug}', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
Route::get('{slug}', ['as' => 'content.show', 'uses' => 'ContentsController@show']);

