<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('provinsi', [ProvinsiController::class, 'index'])->name('provinsi');
Route::get('provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
Route::post('provinsi/store', [ProvinsiController::class, 'store'])->name('provinsi.store');
Route::delete('provinsi/destroy/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');
Route::get('provinsi/edit/{id}', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
Route::put('provinsi/update', [ProvinsiController::class, 'update'])->name('provinsi.update');
Route::put('provinsi/status', [ProvinsiController::class, 'status'])->name('provinsi.status');

Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
Route::post('kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
Route::delete('kecamatan/destroy/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
Route::get('kecamatan/edit/{id}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::put('kecamatan/update', [KecamatanController::class, 'update'])->name('kecamatan.update');
Route::put('kecamatan/status', [KecamatanController::class, 'status'])->name('kecamatan.status');

Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
Route::get('kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahan.create');
Route::post('kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');
Route::delete('kelurahan/destroy/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');
Route::get('kelurahan/edit/{id}', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::put('kelurahan/update', [KelurahanController::class, 'update'])->name('kelurahan.update');

Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('pegawai/destroy/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
Route::get('pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('pegawai/update', [PegawaiController::class, 'update'])->name('pegawai.update');