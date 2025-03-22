<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;

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

Route::get('', function () {
    return view('auth.login');
});

Auth::routes();

    Route::get('/register-admin', [RegisterController::class, 'index']);
    Route::post('/register-admin', [RegisterController::class, 'register_admin']);
    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/register-success', [RegisterController::class, 'register_success']);
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/data-barang', [AdminController::class, 'barang']);
    Route::post('/tambah-barang', [AdminController::class, 'tambah_barang']);
    Route::put('/edit-barang/{id}', [AdminController::class, 'edit_barang']);
    Route::put('/pengembalian/{id}', [AdminController::class, 'pengembalian']);
    Route::delete('/hapus-barang/{id}', [AdminController::class, 'hapus_barang']);
    Route::get('/detail-barang/{id}', [AdminController::class, 'detail_barang']);
    Route::get('/data-pinjaman', [AdminController::class, 'pinjaman']);
    Route::get('/data-users', [AdminController::class, 'profil']);
    Route::put('/edit-data-users/{id}', [AdminController::class, 'edit_profil']);
    
});

Route::middleware(['auth', 'users'])->group(function(){
    Route::get('/register-success', [RegisterController::class, 'register_success']);
    Route::get('/dashboard-users', [UsersController::class, 'index'])->name('users.dashboard');
    Route::get('/barang', [UsersController::class, 'barang']);
    Route::get('/pinjaman', [UsersController::class, 'pinjaman']);
    Route::post('/buat-pinjaman', [UsersController::class, 'buat_pinjaman']);
    Route::put('/pengembalian-barang/{id}', [UsersController::class, 'pengembalian']);
    Route::get('/profil', [UsersController::class, 'profil']);
    Route::put('/edit-profil/{id}', [UsersController::class, 'edit_profil']);
    
});

