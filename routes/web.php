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



Auth::routes();

Route::get('/', 'HomeController@getAllVideos')->name('home');
Route::get('/watch/{id}', 'VideoController@getAllVideos')->name('detail');
Route::get('/profile/{id}', 'VideoController@getAllVideosProfile')->name('profile');

Route::get('/profile/edit/{id}', 'VideoController@getEditVideo');
Route::post('/profile/edit/{id}', 'VideoController@editVideo');

Route::get('/profile/delete/{id}', 'VideoController@deleteVideo');

Route::get('/upload', 'VideoController@getUploadVideo')->middleware('auth');
Route::post('/upload/{id}', 'VideoController@uploadVideo')->middleware('auth');

Route::get('/search', 'VideoController@search');