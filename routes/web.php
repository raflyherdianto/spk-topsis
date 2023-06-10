<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternatifController;

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

Route::get('/dashboard/hasil', [ResultController::class,'index'])->middleware('auth');

Route::post('/dashboard/hasil', [ResultController::class,'hitung'])->middleware('auth');

Route::post('/dashboard/matriks/truncate', [MatrixController::class, 'truncate'])->middleware('auth');

Route::resource('/dashboard/matriks', MatrixController::class)->middleware('auth');

Route::resource('/dashboard/kriteria', KriteriaController::class)->middleware('auth');

Route::resource('/dashboard/alternatif', AlternatifController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');

Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', function () {
    return view('welcome');
});
