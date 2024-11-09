<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semester')->insert([
            'nama_semester' => 'ganjil',
            'mulai_kontrak' => now(),
            'tutup_kontrak' => now()->addMonths(6),
            'nominal_pembayaran' => 500000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
