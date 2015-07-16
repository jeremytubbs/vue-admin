<?php

use App\Content;
use App\Template;

// api for admin pages
Route::group(['prefix' => 'api'], function()
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