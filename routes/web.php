<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'GiphyController@index');

/*Route::get('search', function () {
    return view('search');
});*/

Route::get('/giphs', 'GiphyController@show');

Route::get('/search/{giph}', 'GiphyController@search');

Route::get('/show/{showit}', function ($id)
{
    
});
