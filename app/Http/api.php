<?php

use App\Content;
use App\Template;


Route::get('api/authenticate', ['middleware' => ['auth', 'admin'], function() {
    // this works internaly to the app
    $user = Auth::user();

    try {
        // verify the credentials and create a token for the user
        if (! $token = JWTAuth::fromUser($user)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        // something went wrong
        return response()->json(['error' => 'could_not_create_token'], 500);
    }

    // if no errors are encountered we can return a JWT
    return response()->json(compact('token'));
}]);



// api for admin pages
Route::group(['prefix' => 'api', 'middleware' => ['jwt.auth']], function()
{
    Route::get('content', 'ContentsController@index');

    // Route::post('content', 'ContentsController@store');
    Route::get('content/{id}', 'ContentsController@show');
    Route::get('categories', 'CategoriesController@index');
    Route::get('templates', 'TemplatesController@index');
});