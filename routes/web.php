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
################################### USER ##########################################
// Chi tiết video
Route::get('/watch/{id}', 'VideoController@getAllVideos')->name('detail');

// Profile người dùng
Route::get('/profile/{id}', 'VideoController@getAllVideosProfile')->name('profile');

// Người dùng sửa video
Route::get('/profile/edit/{id}', 'VideoController@getEditVideo');
Route::post('/profile/edit/{id}', 'VideoController@editVideo');

// Người dùng xóa video
Route::get('/profile/delete/{id}', 'VideoController@deleteVideo');

// Người dùng upload
Route::get('/upload', 'VideoController@getUploadVideo')->middleware('auth');
Route::post('/upload/{id}', 'VideoController@uploadVideo')->middleware('auth');
Route::get('/search', 'VideoController@search');

########################################## ADMIN #####################################

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('getLoginAdmin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('getLoginAdmin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// Lấy ra tổng số video và người dùng
Route::get('/admin', 'AdminController@getAll')->name('getAll')->middleware('admin');
Route::get('/admin/user','AdminController@getUser')->name('listUser')->middleware('admin');
Route::get('/admin/video','AdminController@getVideo')->name('listVideo')->middleware('admin');

Route::get('/admin/video/edit/{id}', 'AdminController@getEditVideo')->name('adminEditVideo')->middleware('admin');
Route::post('/admin/video/edit/{id}', 'AdminController@editVideo')->name('adminEditVideo')->middleware('admin');
Route::get('/admin/video/delete/{id}', 'AdminController@deleteVideo')->name('adminDeleteVideo')->middleware('admin');
Route::get('/admin/video/add', 'AdminController@getAddVideo')->name('adminAddVideo')->middleware('admin');
Route::post('/admin/video/add', 'AdminController@addVideo')->name('adminAddVideo')->middleware('admin');

Route::get('/admin/user/add', 'AdminController@getAddddUser')->name('addUser')->middleware('admin');
Route::post('/admin/user/add', 'AdminController@addUser')->name('addUser')->middleware('admin');
Route::get('/admin/user/delete/{id}', 'AdminController@deleteUser')->name('deleteUser')->middleware('admin');