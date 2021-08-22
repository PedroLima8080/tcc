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

Route::get('/', function () {
    return redirect('/home');
})->middleware('auth:user');

Route::get('/home', function(){
    return view('dashboard');
})->middleware('auth:user');

Route::get('/livros', function(){
    return view('livros');
})->middleware('auth:user');

Route::get('/favoritos', function(){
    return view('favoritos');
})->middleware('auth:user');


