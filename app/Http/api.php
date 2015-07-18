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
Route::group(['prefix' => 'api', 'middleware' => ['jwt.auth', 'jwt.admin']], function()
{
    Route::get('content', 'ContentsController@index');

    // I don't know why I am getting an error when I try to use the ContentsController@store
    Route::post('content', function() {
        $content = new Content();
        $content->slug = Request::input('title');
        $content->fill(Request::all());
        $content->save();
        $template = Template::find(Request::input('template_id'));
        $base_path = base_path();
        // make directory for content
        $contentDir = $base_path.'/resources/content/'.$content->id;
        File::makeDirectory($contentDir);
        $templateDir = $base_path.'/resources/templates/'.$template->slug;
        File::copyDirectory($templateDir, $contentDir);
    });

    // Route::post('content', 'ContentsController@store');
    Route::get('content/{id}', 'ContentsController@show');
    Route::post('content/{id}', 'ContentsController@update');
    Route::get('categories', 'CategoriesController@index');
    Route::get('templates', 'TemplatesController@index');
});