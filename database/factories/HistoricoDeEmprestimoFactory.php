<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistoricoDeEmprestimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\HistoricoDeEmprestimo::class;
    
    public function definition(): array
    {
        return [
            'emprestimo_id' => \App\Models\Emprestimo::inRandomOrder()->first()->id ?? \App\Models\Emprestimo::factory(),
            'observacao' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
