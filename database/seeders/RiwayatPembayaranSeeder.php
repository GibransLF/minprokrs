<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riwayat_pembayaran')->insert([
            'mahasiswa_id' => '1',
            'semester_id' => '1',
            'jurusan_id' => '1',
            'kode_pembayaran' => '1731938031M1',
            'gambar' => 'images/1731938031M1.jpg',
            'status' => 'rejected',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
