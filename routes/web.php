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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('posts')->group(function () {
    Route::get('/', 'PostsController@read');
    Route::get('create', 'PostsController@create');
    Route::post('store', 'PostsController@store');
    Route::get('edit/{id}', 'PostsController@edit');
    Route::post('update/{id}', 'PostsController@update');
    Route::get('destroy/{id}', 'PostsController@deletar');
});
