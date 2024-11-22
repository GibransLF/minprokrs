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
            'kode_mk' => 'SI1400',
            'nama_mk' => 'mini Project 2',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '1',
            'kode_mk' => 'SI1001',
            'nama_mk' => 'Machine Learning',
            'sks' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '2',
            'kode_mk' => 'KU1510',
            'nama_mk' => 'Pendidikan Agama dan Etika',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '2',
            'kode_mk' => 'KU1510',
            'nama_mk' => 'Pendidikan Agama dan Etika',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '3',
            'kode_mk' => 'KU1510',
            'nama_mk' => 'Bahasa Indonesia',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '3',
            'kode_mk' => 'KU1510',
            'nama_mk' => 'Bahasa Indonesia',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '1',
            'kode_mk' => 'KD1103',
            'nama_mk' => 'Paket Aplikasi',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '4',
            'kode_mk' => 'KD1623',
            'nama_mk' => 'Riset Oeprasi',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '4',
            'kode_mk' => 'KD1623',
            'nama_mk' => 'Riset Oeprasi',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '1',
            'dosen_id' => '4',
            'kode_mk' => 'KD1624',
            'nama_mk' => 'Sistem Pengamanan Komputer',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '4',
            'kode_mk' => 'KD1624',
            'nama_mk' => 'Sistem Pengamanan Komputer',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '4',
            'kode_mk' => 'KD1624',
            'nama_mk' => 'Data Mining',
            'sks' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mata_kuliah')->insert([
            'jurusan_id' => '2',
            'dosen_id' => '5',
            'kode_mk' => 'KU1101',
            'nama_mk' => 'Bahasa Inggris 1',
            'sks' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
