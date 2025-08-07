<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emprestimos')->insert([
            [
                'user_id' => 1,
                'material_id' => 1,
                'data_de_retirada' => Carbon::now()->subDays(10),
                'data_de_devolucao' => Carbon::now()->addDays(5),
                'data_limite' => Carbon::now()->addDays(10),
                'nota_antes_do_emprestimo' => 'Optimas condições!',
                'nota_apos_emprestimo' => 'Pessimas condições!',
                'unidades' => '1',
                'notificacao' => 'Nenhuma',
                'status_emprestimo' => 'EMPRESTADO',
                'multa' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'material_id' => 2,
                'data_de_retirada' => Carbon::now()->subDays(15),
                'data_de_devolucao' => Carbon::now()->addDays(2),
                'data_limite' => Carbon::now()->addDays(7),
                'nota_antes_do_emprestimo' => 'Optimas condições!',
                'nota_apos_emprestimo' => 'Pessimas condições!',
                'unidades' => '1',
                'notificacao' => 'Atraso previsto',
                'status_emprestimo' => 'PENDENTE',
                'multa' => 5.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'material_id' => 3,
                'data_de_retirada' => Carbon::now()->subDays(5),
                'data_de_devolucao' => Carbon::now()->addDays(7),
                'data_limite' => Carbon::now()->addDays(12),
                'nota_antes_do_emprestimo' => 'Optimas condições!',
                'nota_apos_emprestimo' => 'Pessimas condições!',
                'unidades' => '1',
                'notificacao' => 'Em tempo',
                'status_emprestimo' => 'PENDENTE',
                'multa' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'material_id' => 4,
                'data_de_retirada' => Carbon::now()->subDays(20),
                'data_de_devolucao' => Carbon::now()->subDays(2),
                'data_limite' => Carbon::now()->addDays(7),
                'nota_antes_do_emprestimo' => 'Optimas condições!',
                'nota_apos_emprestimo' => 'Pessimas condições!',
                'unidades' => '1',
                'notificacao' => 'Devolvido com atraso',
                'status_emprestimo' => 'DEVOLVIDO',
                'multa' => 10.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'material_id' => 5,
                'data_de_retirada' => Carbon::now()->subDays(2),
                'data_de_devolucao' => Carbon::now()->addDays(10),
                'data_limite' => Carbon::now()->addDays(15),
                'nota_antes_do_emprestimo' => 'Optimas condições!',
                'nota_apos_emprestimo' => 'Pessimas condições!',
                'unidades' => '1',
                'notificacao' => 'Nova retirada',
                'status_emprestimo' => 'EMPRESTADO',
                'multa' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
