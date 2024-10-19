<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuktiPembayaranController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\KRSController;
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
        Route::get('/mahasiswa/changepass/{id}', [MahasiswaController::class, 'changepass'])->name('mahasiswa.changepass');
        
        //admin
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        
        //institusi fakultas
        Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas');
        
        //institusi jurusan
        Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
        Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
        
        //dosen
        Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
        
        //matakuliah
        Route::get('/matkul', [MatKulController::class, 'index'])->name('matkul');
        
        //semester
        Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
        
        //KRS
        Route::get('/krs', [KRSController::class, 'index'])->name('krs');
        
    });

    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('/pengajuan/detail', [PengajuanController::class, 'detail'])->name('pengajuan.detail'); 
        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create'); 
    });

    //Bukti Pembayaran
    Route::get('/buktipembayaran', [BuktiPembayaranController::class, 'index'])->name('buktipembayaran');
    Route::get('/buktipembayaran/detail', [BuktiPembayaranController::class, 'show'])->name('buktipembayaran.detail');
        
    //kontrak
    Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak');
    Route::get('/kontrak/detail', [KontrakController::class, 'show'])->name('kontrak.detail');

});

require __DIR__.'/auth.php';
