<?php

use App\Helper\Helper;
use App\Http\Controllers\LibsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PasswordController;

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

Route::get('/home', function () {
    $msg = Helper::getCustomMsg();
    return view('dashboard', ['msg' => $msg]);
})
->middleware('auth:user,library')
->name('home');

Route::get('/livros', function () {
    return view('livros');
})->middleware('auth:user,library');

Route::get('/libs', [LibsController::class, 'sla'])
    ->middleware('auth:user,library')
    ->name('libs');

Route::post('/confirm-lib/{id}', [LibsController::class, 'confirmLib'])
    ->middleware('auth:user,library')
    ->name('confirm-lib');

Route::delete('/decline-lib/{id}', [LibsController::class, 'declineLib'])
    ->middleware('auth:user,library')
    ->name('decline-lib');

Route::get('/favoritos', [FavoriteController::class, 'index'])->middleware('auth:user,library');

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
Route::post('/get-library-cnpj', [LibsController::class, 'getLibraryByCnpj']);
Route::post('/remove-book', [BookController::class, 'removeBook']);

Route::get('/change-password', [PasswordController::class, 'index'])
    ->name('changePassword')
    ->middleware('guest');

Route::post('/request-email-password', [PasswordController::class, 'requestEmailPassword'])
    ->name('requestEmailPassword')
    ->middleware('guest');

Route::get('/update-password/{id}', [PasswordController::class, 'update'])
    ->name('updatePassword')
    ->middleware('guest');

Route::post('/salve-new-password', [PasswordController::class, 'save'])
    ->name('saveNewPassword')
    ->middleware('guest');
