<?php

namespace  App\Http\Controllers;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/karyawan', KaryawanController::class)->parameter('karyawan', 'id');

    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');
    Route::get('/mahasiswa/{id}/nilai', [MahasiswaController::class, 'nilai']);

    Route::resource('articles', ArticleController::class)->parameter('articles', 'id');
    Route::get('/articles/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
});