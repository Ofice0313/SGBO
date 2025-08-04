<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nome' => 'Ciência', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Tecnologia', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Literatura', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Matemática', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'História', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
