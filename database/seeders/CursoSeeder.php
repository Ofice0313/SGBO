<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            ['nome' => 'Engenharia Informática', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Ciência de Dados', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Física Aplicada', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'História Moderna', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Matemática Pura', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
