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
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained('jurusan');
            $table->foreignId('mk_id')->constrained('mata_kuliah');
            $table->foreignId('dosen_id')->constrained('dosen');
            $table->foreignId('semester_id')->constrained('semester');
            $table->time('mulai');
            $table->time('selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
