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

Route::get('/', 'CarController@index')->name('home');
Route::post('/submit', 'CarController@create')->name('homeSubmit');

Route::get('/cars/{id}', 'CarController@getCar')->name('getCar');

//using livewire
Route::get('/livewire', 'CarController@livewire')->name('livewire');