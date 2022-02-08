<?php

use App\Http\Controllers\ConectionController;
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

Route::resource('/', \App\Http\Controllers\PrincipalController::class);
Route::resource('/data-base', \App\Http\Controllers\DataBaseController::class);

Route::get('/conection', [ConectionController::class, 'testConection'])->name('test.conection');