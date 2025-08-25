<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Autor::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'foto' => fake()->imageUrl(250, 300, 'people', true, 'Autor'),
        ];
    }
}
