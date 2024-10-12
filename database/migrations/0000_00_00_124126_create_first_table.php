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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_fakultas');
            $table->string('nama_fakultas');
            $table->timestamps();
        });

        Schema::create('jurusan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');
            $table->string('kode_jurusan');
            $table->string('nama_jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan');
        Schema::dropIfExists('fakultas');
    }
};
