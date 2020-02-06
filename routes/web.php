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

Route::get('/pledgeform', 'PledgeController@create');
Route::post('/pledgestore', 'PledgeController@store');
Route::get('/pledge', 'PledgeController@index');
Route::get('/', 'UserController@index')->name('main');
Route::get('/searchform', 'UserController@searchform');
Route::post('/search', 'UserController@search');
Route::resource('/assets', 'RealestateassetController');
Route::resource('/companies', 'CompanyController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
