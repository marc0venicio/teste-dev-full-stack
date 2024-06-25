<?php

namespace Database\Seeders;

use App\Infrastructure\Database\Models\UserModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserModel::factory(10)->create();

        // UserModel::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'Password' => 'password'
        // ]);
    }
}
