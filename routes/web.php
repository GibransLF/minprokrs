<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RiwayatPembayaranController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\JadwalPerkuliahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatKulController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::group(['middleware' => ['role:admin']], function () {
        
        //mahasiswa
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
        Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::patch('/mahasiswa/upfate/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
        Route::delete('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
        
        Route::put('/mahasiswa/verificationVerified/{id}', [MahasiswaController::class, 'verificationVerified'])->name('mahasiswa.verificationVerified');
        Route::put('/mahasiswa/verificationRejected/{id}', [MahasiswaController::class, 'verificationRejected'])->name('mahasiswa.verificationRejected');
        
        Route::get('/mahasiswa/changePass/{id}', [MahasiswaController::class, 'changePass'])->name('mahasiswa.changePass');
        route::put('/mahasiswa/updatePass/{id}', [MahasiswaController::class, 'updatePass'])->name('mahasiswa.updatePass');
        
        //admin
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
        Route::patch('/admin/upfate/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
        
        Route::get('/admin/changePass/{id}', [AdminController::class, 'changePass'])->name('admin.changePass');
        route::put('/admin/updatePass/{id}', [AdminController::class, 'updatePass'])->name('admin.updatePass');
        
        //institusi fakultas
        Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas');
        Route::post('/fakultas/store', [FakultasController::class, 'store'])->name('fakultas.store');
        Route::patch('/fakultas/update/{id}', [FakultasController::class, 'update'])->name('fakultas.update');
        Route::delete('/fakultas/delete/{id}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');
        
        //institusi jurusan
        Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
        Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
        Route::patch('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
        Route::delete('/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
        
        //dosen
        Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
        Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');
        Route::patch('/dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
        Route::delete('/dosen/destroy/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
        
        //matakuliah
        Route::get('/matkul', [MatKulController::class, 'index'])->name('matkul');
        
        //semester
        Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
        
        //Jadwal Perkuliahan
        Route::get('/jadwalPerkuliahan', [JadwalPerkuliahanController::class, 'index'])->name('jadwalPerkuliahan');
        
    });

    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('/pengajuan/detail', [PengajuanController::class, 'detail'])->name('pengajuan.detail'); 
        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create'); 
    });

    //Bukti Pembayaran
    Route::get('/riwayatPembayaran', [RiwayatPembayaranController::class, 'index'])->name('riwayatPembayaran');
    Route::get('/riwayatPembayaran/detail', [RiwayatPembayaranController::class, 'show'])->name('riwayatPembayaran.detail');
        
    //kontrak
    Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak');
    Route::get('/kontrak/detail', [KontrakController::class, 'show'])->name('kontrak.detail');

});

require __DIR__.'/auth.php';
