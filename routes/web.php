<?php

use App\Helper\Helper;
use App\Http\Controllers\LibsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


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
})->middleware('auth:user,library');

Route::get('/home', function(){
    $msg = Helper::getCustomMsg();
    return view('dashboard', ['msg' => $msg]);
})->middleware('auth:user,library');

Route::get('/livros', function(){
    return view('livros');
})->middleware('auth:user,library');

Route::get('/libs', [LibsController::class, 'sla'])
    ->middleware('auth:user,library')
    ->name('libs');

Route::get('/favoritos', function(){
    return view('favoritos');
})->middleware('auth:user,library');

Route::get('/perfil', [ProfileController::class, 'profile'])
    ->name('profile')
    ->middleware('auth:user,library');
    
    Route::get('/editar-perfil', [ProfileController::class, 'updateProfile'])
    ->name('edit-profile')
    ->middleware('auth:user,library');

Route::post('/perfil', [ProfileController::class, 'store'])
    ->middleware('auth:user,library');

Route::post('/save-book', [BookController::class, 'save']);
Route::post('/has-book', [BookController::class, 'hasBook']);
Route::post('/remove-book', [BookController::class, 'removeBook']);