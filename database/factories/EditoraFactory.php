<?php

namespace Database\Factories;

use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editora>
 */
class EditoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Editora::class;

    public function configure()
    {
        return $this->afterCreating(function (Editora $editora) {
            $livros = Livro::factory()->count($this->faker->numberBetween(1, 3))->for($editora)->create();
        });
    }

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'logo' => fake()->imageUrl(250, 300, 'logo', true, 'Autor'),
        ];
    }
}
