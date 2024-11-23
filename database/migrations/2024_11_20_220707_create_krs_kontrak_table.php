<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('krs_kontrak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa');
            $table->foreignId('semester_id')->constrained('semester');
            $table->foreignId('jurusan_id')->constrained('jurusan');
            $table->foreignId('krs_id')->constrained('krs');
            $table->foreignId('riwayat_pembayaran_id')->constrained('riwayat_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs_kontrak');
    }
};