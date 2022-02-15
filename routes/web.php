<?php

use App\Http\Controllers\ConectionController;
use App\Http\Controllers\TooslController;
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
Route::resource('/user-data-base', \App\Http\Controllers\UserDataBaseController::class);

Route::get('/data-base/search', [ConectionController::class, 'testConection'])->name('data-base.search');
Route::get('/conection', [ConectionController::class, 'testConection'])->name('test.conection');
Route::get('/tools/compare-data-base', [TooslController::class, 'compareDataBase'])->name('tools.compare-data-base');
Route::get('/tools/integridade-campo', [TooslController::class, 'integridadeCampo'])->name('tools.integridade-campo');
Route::get('/tools/load-data-base', [TooslController::class, 'loadDataBase'])->name('tools.load-data-base');
Route::post('/tools/load-data-base-load', [TooslController::class, 'loadDataBaseLoad'])->name('tools.load-data-base-load');
Route::post('/tools/load-data-base', [TooslController::class, 'loadDataBaseSave'])->name('tools.load-data-base-save');