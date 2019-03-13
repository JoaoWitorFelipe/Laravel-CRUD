<?php

//use Illuminate\Http\Request;

Route::get('/', 'UsersController@show');
Route::post('/', 'UsersController@create');
Route::get('/delete/{id_user}', 'UsersController@delete');
Route::get('/update/{id_user}', 'UsersController@update');
