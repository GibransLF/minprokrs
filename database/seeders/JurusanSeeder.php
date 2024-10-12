<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            'fakultas_id' => '1',
            'kode_jurusan' => 'SI',
            'nama_jurusan' => 'Sistem Informasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jurusan')->insert([
            'fakultas_id' => '1',
            'kode_jurusan' => 'TI',
            'nama_jurusan' => 'Teknik Informatika',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
