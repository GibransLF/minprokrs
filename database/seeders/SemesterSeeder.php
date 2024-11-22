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
            'nama_semester' => 'Antara',
            'tahun_ajaran' => '2023-2024',
            'mulai_kontrak' => now()->subMonths(3),
            'tutup_kontrak' => now()->subMonths(1),
            'nominal_pembayaran' => 450000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('semester')->insert([
            'nama_semester' => 'ganjil',
            'tahun_ajaran' => '2024-2025',
            'mulai_kontrak' => now(),
            'tutup_kontrak' => now()->addMonths(6),
            'nominal_pembayaran' => 500000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
