<?php

Route::get('admin', ['middleware' => ['auth', 'admin'], function () {
    $user = Auth::user();
    $user = array_except($user, ['created_at', 'updated_at']);
    if (Auth::user()->hasGroup('admin')) {
        $customClaims = ['group' => 'admin'];
        $token = JWTAuth::fromUser($user, $customClaims);
    }
    return view('admin', compact('token'));
}]);

// api for admin pages
Route::group(['prefix' => 'admin/api', 'middleware' => ['jwt.auth', 'jwt.admin']], function()
{
    // route used by content-create.js
    Route::post('content', 'AdminController@postContent');
    // route used by editor.js
    Route::post('content/{id}', 'AdminController@postEditor');
    // route used by file-manager.js
    Route::post('upload/{id}', 'AdminController@postUpload');

});
