<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[PostController::class,'index']);
//
Route::resource('post', PostController::class)->except('index');
//
Auth::routes();
//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('{id}/{slug}',[PostController::class,'getByCat'])->name('category');
//
Route::post('/search',[PostController::class,'search'])->name('search');