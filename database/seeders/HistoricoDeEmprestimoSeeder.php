<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\HistoricoDeEmprestimo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoricoDeEmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \App\Models\HistoricoDeEmprestimo::factory()->count(10)->create();
    }
}
