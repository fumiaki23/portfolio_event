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

Route::get('/', 'PostController@index');
Route::get('/profile/{post}/name', 'PostController@profile');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/recuruit', 'PostController@recuruit');
Route::get('/posts/recuruited', 'PostController@recuruited');
Route::get('/posts/history', 'PostController@history');
Route::post('/posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('/posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');
// Route::post('/posts/{post}/member', 'PostController@member');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
