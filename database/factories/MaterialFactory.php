<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'autor' => $this->faker->name(),
            'editora' => $this->faker->company(),
            'ano_de_publicacao' => $this->faker->year(),
            'caminho_do_arquivo' => $this->faker->filePath(),
            'caminho_da_imagem' => $this->faker->imageUrl(640, 480, 'books'),
            'paginas' => $this->faker->numberBetween(50, 1000),
            'tipo' => $this->faker->randomElement(['LIVRO', 'AUDIOLIVRO']),
            'status_material' => $this->faker->randomElement(['DISPONIVEL', 'INDISPONIVEL']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
