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

//home route
Route::get('/', function() {
    return view('welcome');
})->name('home');

//livewire route
Route::get('/livewire', function(){
    return view('livewire');
})->name('livewire');

//vue route
Route::get('/vue', function(){
    return view('vue');
})->name('vue');


Route::post('/submit', 'CarController@create')->name('homeSubmit');
Route::get('/cars/{id}', 'CarController@getCar')->name('getCar');
