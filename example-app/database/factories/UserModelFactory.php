<?php

namespace Database\Factories;

use App\Infrastructure\Database\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserModelFactory extends Factory
{

    protected $model = UserModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $this->faker->numerify('###########'), // Gera um CPF aleatório (11 dígitos)
            'password' => bcrypt('password'), // Defina a senha padrão aqui
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
