<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// admin controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;

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
Route::get('/genre', [IndexController::class,'genre'])->name('genre');
Route::get('/movie', [IndexController::class,'movie'])->name('movie');
Route::get('/watch', [IndexController::class,'watch'])->name('watch');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin route
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
