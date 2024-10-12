<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\FakultasSeeder;
use Database\Seeders\JurusanSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\MahasiswaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RolePermissionSeeder::class);
        $this->call(FakultasSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(MahasiswaSeeder::class);
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
