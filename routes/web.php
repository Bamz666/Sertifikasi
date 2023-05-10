<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/admin/createjurusan', [AdminController::class, 'create'])->name('admin.createjurusan');
Route::get('/admin/createagama', [AdminController::class, 'createagama'])->name('admin.createagama');
Route::get('/dashboard/createregistrasi', [AdminController::class, 'createregistrasi'])->name('dashboard.createregistrasi');


Route::post('/admin/storejurusan', [AdminController::class, 'store'])->name('admin.storejurusan');
Route::post('/admin/storeagama', [AdminController::class, 'storeagama'])->name('admin.storeagama');
Route::post('/dashboard/storeregistrasi', [AdminController::class, 'storeregistrasi'])->name('dashboard.storeregistrasi');

Route::get('/admin/editagama/{id_agama}', [AdminController::class, 'editagama'])->name('admin.editagama');
Route::get('/admin/editjurusan/{id_jurusan}', [AdminController::class, 'editjurusan'])->name('admin.editjurusan');
Route::get('/admin/editregistrasi/{id_registrasi}', [AdminController::class, 'editregistrasi'])->name('admin.editregistrasi');

Route::put('/admin/updateagama/{id_agama}', [AdminController::class, 'updateagama'])->name('admin.updateagama');
Route::put('/admin/updatejurusan/{id_jurusan}', [AdminController::class, 'updatejurusan'])->name('admin.updatejurusan');
Route::put('/admin/updateregistrasi/{id_registrasi}', [AdminController::class, 'updateregistrasi'])->name('admin.updateregistrasi');

Route::get('/admin/destroyjurusan/{id_jurusan}', [AdminController::class, 'destroyjurusan'])->name('admin.destroyjurusan');
Route::get('/admin/destroyagama/{id_agama}', [AdminController::class, 'destroyagama'])->name('admin.destroyagama');
Route::get('/admin/destroyregistrasi/{id_registrasi}', [AdminController::class, 'destroyregistrasi'])->name('admin.destroyregistrasi');

Route::get('/export-pdf', [AdminController::class, 'exportPdf']);
