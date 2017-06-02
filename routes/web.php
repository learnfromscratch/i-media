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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/client/{id}/admin', 'GroupeController@admin')->name('client.admin');

Route::get('/search', 'HomeController@search')->name('articles.search');

Route::get('/{id}', 'HomeController@show')->name('articles.show');

Route::post('/download', 'HomeController@download')->name('download.pdf');

Route::post('/groupes/store', 'SousGroupeController@store')->name('sousGroupes.store');

Route::get('/groupes/destroy/{id}', 'SousGroupeController@destroy')->name('sousGroupes.destroy');

Route::get('/users/all', 'UserController@all')->name('users.all');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::post('/users/update/{id}', 'UserController@update')->name('users.update');
Route::get('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/clients/all', 'GroupeController@index')->name('groupes.index');
    Route::get('/clients/create', 'GroupeController@create')->name('groupes.create');
    Route::post('/clients/store', 'GroupeController@store')->name('groupes.store');
    Route::get('/clients/{id}', 'GroupeController@show')->name('groupes.show');
    Route::post('/clients/update/{id}', 'GroupeController@update')->name('groupes.update');
    Route::get('/clients/destroy/{id}', 'GroupeController@destroy')->name('groupes.destroy');
    });

Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/indexing', 'AdminController@indexing')->name('admin.indexing');

Route::post('/newsletter', 'NewsletterController@index')->name('newsletter');

Route::get('test/index', 'TestController@index');

Route::get('home/expired', function () {
	return view('expire');
});
