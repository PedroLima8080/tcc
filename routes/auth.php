<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use GuzzleHttp\Middleware;

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

Route::get('/login', [AuthController::class, 'loginUserForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'loginUser'])
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'registerUserForm'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])
    ->middleware('guest');

Route::get('/library/login', [AuthController::class, 'loginLibraryForm'])
    ->middleware('guest')
    ->name('loginLibrary');

Route::post('/library/login', [AuthController::class, 'loginLibrary'])
    ->middleware('guest');

Route::get('library/register', [AuthController::class, 'registerLibraryForm'])
    ->middleware('guest')
    ->name('registerLibrary');

Route::post('library/register', [AuthController::class, 'registerLibrary'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logoutUser'])
    ->middleware('auth:user,library')
    ->name('logout');
