<?php

//use Illuminate\Http\Request;

// Routes para o usuário.
Route::get('/', 'UsersController@show');
Route::post('/', 'UsersController@create');
Route::get('/delete/{id_user}', 'UsersController@delete');
Route::get('/update/{id_user}', 'UsersController@update');

//Routes para a API.
Route::get('/api', 'ApiController@show');
Route::post('/repos', 'ApiController@repos');
Route::get('/delete_repos/{id_repos}', 'ApiController@delete');