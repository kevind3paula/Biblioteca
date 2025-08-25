<?php

namespace Database\Factories;

use App\Models\Editora;
use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Livro::class;

    public function configure()
    {
        return $this->afterCreating(function (Livro $livro) {
            $autores = Autor::factory()->count(2)->create();
            $livro->autores()->attach($autores->pluck('id')->toArray());
        });
    }

    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->isbn13(),
            'nome' => fake()->sentence(3),
            'editora_id' => Editora::factory(),
            'bibliografia' => fake()->text(),
            'capa' => fake()->imageUrl(350, 400, 'books', true, 'Capa'),
            'preco' => fake()->randomFloat(2, 10, 300),
        ];
    }

}
