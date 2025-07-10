<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
                'nome' => 'Informática',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Gestão',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Direito',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Medicina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Engenharia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
