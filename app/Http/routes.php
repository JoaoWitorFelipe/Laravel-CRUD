<?php

use Illuminate\Http\Request;

Route::get('/', 'UsersController@show');
Route::post('/', 'UsersController@create');
