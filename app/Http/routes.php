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

//Routes para relacionar User com Repos da API
Route::get('/relate', 'RelateController@show');
Route::post('/relate', 'RelateController@create');
Route::get('/delete_relate/{id_user}/{id_repos}', 'RelateController@delete');