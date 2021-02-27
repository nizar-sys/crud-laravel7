<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonfigurasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('page.index', ['alertmsg' => 'Success adding data!']);
});

Route::resource('crud', CrudController::class)->middleware('auth');
// end of crud controller

// // auth controller
// Route::resource('/login', AuthController::class);
// Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ui login


Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/konfigurasi/setup', [App\Http\Controllers\KonfigurasiController::class, 'store'])->name('konfigurasi');
Route::resource('/konfigurasi', KonfigurasiController::class)->middleware('auth');
Route::resource('master-data/divisi', DivisiController::class)->middleware('auth');
Route::resource('karyawan', KaryawanController::class)->middleware('auth');
