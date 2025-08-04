<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\HistoricoDeEmprestimo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoricoDeEmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //    \App\Models\HistoricoDeEmprestimo::factory()->count(10)->create();
    // }

    public function run(): void
    {
        DB::table('historico_de_emprestimos')->insert([
            [
                'emprestimo_id' => 1,
                'observacao' => 'Primeiro empréstimo do utilizador 1.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'emprestimo_id' => 2,
                'observacao' => 'Atraso previsto no retorno.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'emprestimo_id' => 3,
                'observacao' => 'Material ainda em posse do utilizador.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'emprestimo_id' => 4,
                'observacao' => 'Multa aplicada devido a atraso.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'emprestimo_id' => 5,
                'observacao' => 'Novo empréstimo realizado com sucesso.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
