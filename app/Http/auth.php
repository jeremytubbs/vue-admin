<?php

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