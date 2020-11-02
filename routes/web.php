<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('kontak', 'KontakController');
Route::resource('/hobby', 'HobbyController');
Route::resource('/kontak-hobbies', 'KontakHobbyController');
Route::POST('/kontak-hobbies/delete', 'KontakHobbyController@destroy');
Route::resource('/golonganDarah', 'GolonganDarahController');
