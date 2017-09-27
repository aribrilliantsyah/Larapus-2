<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'GuestController@index');
Route::post('/', 'GuestController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/coba', 'CobaaController');

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function(){
	Route::resource('pakets','PaketController');
	Route::resource('pengambilan','AmbilController');
	Route::resource('divisis','DivisiController');
	Route::resource('rincian','RincianController');
});

// Route::post('guest/search','GuestController@search');

Route::get('books/{book}/borrow', [
	'middleware'=>['auth','role:member'],
	'as'=>'guest.books.borrow',
	'uses'=>'BooksController@borrow']);

Route::put('books/{book}/return', [
	'middleware'=>['auth','role:member'],
	'as'=>'member.books.return',
	'uses'=>'BooksController@returnBack']);

Route::get('pakets/{paket}/return', [
	'middleware'=>['auth','role:admin'],
	'as'=>'admin.pakets.return',
	'uses'=>'PaketController@returnBack']);
Route::post('/ambil/{id}', 'PaketController@ambil');

Route::get('auth/verify/{token}','Auth\RegisterController@verify');
Route::get('settings/profile','SettingsController@profile');
Route::get('settings/profile/edit','SettingsController@editProfile');
Route::post('settings/profile','SettingsController@updateProfile');
Route::get('settings/password','SettingsController@editPassword');
Route::post('settings/password','SettingsController@updatePassword');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');

