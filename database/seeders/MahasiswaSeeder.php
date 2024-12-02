<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => 'MhsTes123',
            'email' => 'mhs@test.com',
            'password' => Hash::make('pass1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('mahasiswa')->insert([
            'user_id'=> $userId,
            'fakultas_id'=> '1',
            'jurusan_id'=> '1',
            'nim' => '0123210',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::findOrFail($userId);
        $user->assignRole('mahasiswa');
    }
}
