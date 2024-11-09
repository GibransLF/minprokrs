<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '1',
            'kode_mk' => 'KMK12345',
            'nama_mk' => 'mini Project 2',
            'sks' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
