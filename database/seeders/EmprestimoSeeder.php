<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            User::factory()->count(10)->create();
        }
        if (Material::count() === 0) {
            Material::factory()->count(20)->create();
        }

        // Cria os emprestimos
        Emprestimo::factory()->count(30)->create();
    }
}
