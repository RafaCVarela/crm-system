<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->numerify('(##) #####-####'),
            'cpf' => fake('pt_BR')->unique()->cpf(),
            'cnpj' => fake('pt_BR')->unique()->cnpj(),
            'pais' => 'Brasil',
            'estado' => fake('pt_BR')->state(),
            'municipio' => fake('pt_BR')->city(),
            'logradouro' => fake('pt_BR')->streetName(),
            'ativo' => fake()->boolean(50),

            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
