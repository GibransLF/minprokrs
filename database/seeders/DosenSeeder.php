<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            'nidn' => '123456781',
            'nama_dosen' => 'Eka Anas Jatnika, S.Ds',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dosen')->insert([
            'nidn' => '1234567892',
            'nama_dosen' => 'Ani Nuraeni, S.Pd.I',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dosen')->insert([
            'nidn' => '1234567893',
            'nama_dosen' => 'Firna Novian Agustian, S.Pd',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dosen')->insert([
            'nidn' => '1234567894',
            'nama_dosen' => 'Emi Latifah, S.Kom',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('dosen')->insert([
            'nidn' => '1234567895',
            'nama_dosen' => 'Mety Mutia Ulfah, S.Pd',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
