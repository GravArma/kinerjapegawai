<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [HomeController::class, 'index']);

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'dashboard');
    Route::get('admin/dashboard', 'dashboard');
    Route::get('admin/logout', 'logout');
    Route::get('admin/pegawaidaftar', 'pegawaidaftar');
    Route::get('admin/pegawaitambah', 'pegawaitambah');
    Route::post('admin/pegawaitambahsimpan', 'pegawaitambahsimpan');
    Route::get('admin/pegawaiedit/{id}', 'pegawaiedit');
    Route::post('admin/pegawaieditsimpan/{id}', 'pegawaieditsimpan');
    Route::get('admin/pegawaihapus/{id}', 'pegawaihapus');

    
    Route::get('admin/laporandaftar', 'laporandaftar');
    Route::post('admin/laporancetak', 'laporancetak');

    Route::get('admin/penilaiandaftar', 'penilaiandaftar');
    Route::get('admin/penilaiantambah', 'penilaiantambah');
    Route::post('admin/penilaiantambahsimpan', 'penilaiantambahsimpan');
    Route::get('admin/penilaianedit/{id}', 'penilaianedit');
    Route::post('admin/penilaianeditsimpan/{id}', 'penilaianeditsimpan');
    Route::get('admin/penilaianhapus/{id}', 'penilaianhapus');

    Route::get('admin/prediksi', 'prediksi');


});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('loginakun', 'login');
    Route::post('logincek', 'logincek');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
