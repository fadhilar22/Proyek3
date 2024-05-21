<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::view('/', 'welcome');

Route::view('/masuk', 'masuk')->name('masuk');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::view('/daftar', 'daftar')->name('daftar');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::post('/edit/profile', [UserController::class, 'updateProfile'])->name('edit.profile');
Route::post('/edit/foto', [UserController::class, 'updateFoto'])->name('edit.foto');


Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/dashboard-admin', [AdminController::class, 'dashboardSelected'])->name('admin.dashboardSelected');
Route::post('/sedekah', [AdminController::class, 'sedekah'])->name('admin.sedekah');

Route::view('/tentang', 'tentang');
Route::view('/kontak', 'kontak');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
