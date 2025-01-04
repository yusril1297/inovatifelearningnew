<?php

namespace Database\Seeders;

use App\Models\setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 0,
            'password' => bcrypt('12345678'),
        ]);

        // setting::create([
        //     'name_cors' => 'SocioEdu',
        //     'logo' => 'logo.png',
        //     'path_logo' => 'uploads/logo.png',
        // ]);
    }
}
