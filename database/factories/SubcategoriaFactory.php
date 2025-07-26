<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategoria>
 */
class SubcategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'categoria_id' => Categoria::inRandomOrder()->value('id') ?? Categoria::factory()->create()->id,
            'material_id' => Material::inRandomOrder()->value('id') ?? Material::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
