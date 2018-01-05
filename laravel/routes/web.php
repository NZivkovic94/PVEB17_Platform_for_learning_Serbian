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

Route::get('/', 'logUser@signIn');

Auth::routes();


// This is generated with "php artisan make:auth"
// We probably dont need it but its gonna stay for now
Route::get('/home', 'HomeController@index')->name('home');
