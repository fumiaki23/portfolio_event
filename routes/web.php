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
Route::get('/profile/{user}/name', 'PostController@profile');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/recuruit', 'PostController@recuruit');
Route::get('/posts/recuruited', 'PostController@recuruited');
Route::get('/posts/history', 'PostController@history');
Route::get('/posts/participation', 'PostController@participation');
Route::post('/posts/{post}/participants', 'ParticipantContoroller@store')->name('participants');
Route::post('/posts/{post}/nonparticipants', 'ParticipantContoroller@destroy')->name('nonparticipants');
Route::get('/posts/{post}/applicants', 'ParticipantContoroller@applicants')->name('applicants');
// Route::post('/posts/{post}/member', 'PostController@member');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts/{post}/comment', 'CommentController@store');
Route::post('/posts', 'PostController@store');
Route::get('/', 'PostController@index')->name('posts.index');
Route::post('/posts/{post}', 'LikeController@like')->name('posts.index');

Route::delete('/posts/{post}', 'PostController@delete');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
