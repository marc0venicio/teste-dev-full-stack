<?php

namespace Database\Seeders;

use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserModel::factory()
        ->count(10)
        ->state(new Sequence(
            ['name' => 'João'],
            ['name' => 'Maria'],
        ))
        ->create();
    }
}
