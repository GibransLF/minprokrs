<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([
            'kode_fakultas' => 'FIk',
            'nama_fakultas' => 'Fakultas ilmu Komputer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
