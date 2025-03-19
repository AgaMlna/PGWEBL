<?php

namespace Database\Seeders;

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

        User::factory()->create(
            [
            'name' => 'Aga',
            'email' => 'agamaulna@gmail.com',
            'password' => bcrypt('admin123'),
            ]
        );

        User::factory()->create(
            [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            ]
        );
    }
}
