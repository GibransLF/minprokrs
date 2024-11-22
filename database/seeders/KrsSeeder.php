<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '1',
            'dosen_id' => '1',
            'semester_id' => '2',
            'mulai' => '15:30:00',
            'selesai' => '16:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '2',
            'dosen_id' => '1',
            'semester_id' => '2',
            'mulai' => '16:30:00',
            'selesai' => '18:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '3',
            'dosen_id' => '2',
            'semester_id' => '2',
            'mulai' => '14:00:00',
            'selesai' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '4',
            'dosen_id' => '2',
            'semester_id' => '2',
            'mulai' => '14:00:00',
            'selesai' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '5',
            'dosen_id' => '3',
            'semester_id' => '2',
            'mulai' => '13:00:00',
            'selesai' => '14:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '6',
            'dosen_id' => '3',
            'semester_id' => '2',
            'mulai' => '13:00:00',
            'selesai' => '14:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '7',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '16:00:00',
            'selesai' => '17:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '8',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '15:30:00',
            'selesai' => '16:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '9',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '15:30:00',
            'selesai' => '16:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '1',
            'mk_id' => '10',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '14:00:00',
            'selesai' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '11',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '14:00:00',
            'selesai' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '12',
            'dosen_id' => '4',
            'semester_id' => '2',
            'mulai' => '13:00:00',
            'selesai' => '14:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('krs')->insert([
            'jurusan_id' => '2',
            'mk_id' => '13',
            'dosen_id' => '5',
            'semester_id' => '2',
            'mulai' => '13:00:00',
            'selesai' => '14:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
