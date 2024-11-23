<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatPembayaranController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KrsKontrakController;
use App\Http\Controllers\JadwalPerkuliahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuiiahController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
        Route::get('/mataKuliah', [MataKuiiahController::class, 'index'])->name('matkul');
        Route::post('/mataKuliah/store', [MataKuiiahController::class, 'store'])->name('matkul.store');
        Route::patch('/mataKuliah/update/{id}', [MataKuiiahController::class, 'update'])->name('matkul.update');
        Route::delete('/mataKuliah/destroy/{id}', [MataKuiiahController::class, 'destroy'])->name('matkul.destroy');
        
        //semester
        Route::get('/semester', [SemesterController::class, 'index'])->name('semester');
        Route::post('/semester/store', [SemesterController::class, 'store'])->name('semester.store');
        Route::patch('/semester/update/{id}', [SemesterController::class, 'update'])->name('semester.update');
        Route::delete('/semester/destroy/{id}', [SemesterController::class, 'destroy'])->name('semester.destroy');
        
        //Jadwal Perkuliahan
        Route::get('/jadwalPerkuliahan/{id}', [JadwalPerkuliahanController::class, 'index'])->name('jadwalPerkuliahan');
        Route::post('/jadwalPerkuliahan/store/{id}', [JadwalPerkuliahanController::class, 'store'])->name('jadwalPerkuliahan.store');
        Route::patch('/jadwalPerkuliahan/update/{id}', [JadwalPerkuliahanController::class, 'update'])->name('jadwalPerkuliahan.update');
        Route::delete('/jadwalPerkuliahan/destroy/{id}', [JadwalPerkuliahanController::class, 'destroy'])->name('jadwalPerkuliahan.destroy');
    });

    Route::group(['middleware' => ['role:mahasiswa']], function () {
        Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::get('/pengajuan/{id}', [PengajuanController::class, 'show'])->name('pengajuan.show'); 
        Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
        Route::post('/pengajuan/store/{id}', [PengajuanController::class, 'store'])->name('pengajuan.store');
    });

    //Bukti Pembayaran
    Route::get('/riwayatPembayaran', [RiwayatPembayaranController::class, 'index'])->name('riwayatPembayaran');
    Route::get('/riwayatPembayaran/{id}', [RiwayatPembayaranController::class, 'show'])->name('riwayatPembayaran.show');
    Route::patch('/riwayatPembayaran/rejected/{id}', [RiwayatPembayaranController::class, 'rejected'])->name('riwayatPembayaran.rejected');
    Route::patch('/riwayatPembayaran/verified/{id}', [RiwayatPembayaranController::class, 'verified'])->name('riwayatPembayaran.verified');
    Route::patch('/riwayatPembayaran/update/{id}', [RiwayatPembayaranController::class, 'update'])->name('riwayatPembayaran.update');

        
    //kontrak
    Route::get('/kontrak', [KrsKontrakController::class, 'index'])->name('kontrak');
    Route::get('/kontrak/create/{id}', [KrsKontrakController::class, 'create'])->name('kontrak.create');
    Route::post('/kontrak/store/{id}', [KrsKontrakController::class, 'store'])->name('kontrak.store');
    Route::get('/kontrak/detail/{id}', [KrsKontrakController::class, 'detail'])->name('kontrak.detail');

});

require __DIR__.'/auth.php';
