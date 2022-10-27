<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Route::get( '/register' , [ RegisterController::class, 'index' ])->name('register');
Route::post( '/register' , [ RegisterController::class, 'store' ])->name('register');

Route::get( '/login' , [ LoginController::class, 'index' ])->name('login');
Route::post( '/login' , [ LoginController::class, 'store' ])->name('login');
Route::post( '/logout' , [ logoutController::class, 'store' ])->name('logout');

Route::get( '/{user:username}' , [ PostController::class, 'index' ])->name('post.index');

