<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprestimo>
 */
class EmprestimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // Gerar datas coerentes
        $dataDeRetirada = $this->faker->dateTimeBetween('-2 months', 'now');
        $dataDeDevolucao = $this->faker->boolean(70) // 70% de chance de já ter sido devolvido
            ? $this->faker->dateTimeBetween($dataDeRetirada, 'now')
            : null;

        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'material_id' => Material::inRandomOrder()->value('id'),
            'data_de_retirada' => $dataDeRetirada,
            'data_de_devolucao' => $dataDeDevolucao,
            'multa' => $dataDeDevolucao ? $this->faker->randomFloat(2, 0, 100) : 0,
            'notificacao' => $this->faker->boolean(),
            'status_emprestimo' => $dataDeDevolucao
                ? 'DEVOLVIDO'
                : $this->faker->randomElement(['PENDENTE', 'EMPRESTADO']),
        ];
    }
}
