<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class,'home'])->name('homepage');
Route::get('/category', [IndexController::class,'category'])->name('category');
Route::get('/country', [IndexController::class,'country'])->name('country');
Route::get('/episode', [IndexController::class,'episode'])->name('episode');
Route::get('/gerne', [IndexController::class,'gerne'])->name('gerne');
Route::get('/movie', [IndexController::class,'movie'])->name('movie');
Route::get('/watch', [IndexController::class,'watch'])->name('watch');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
