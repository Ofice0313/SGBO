<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategorias')->insert([
            ['nome' => 'Física', 'categoria_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Programação', 'categoria_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Romance', 'categoria_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Álgebra', 'categoria_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Antiga', 'categoria_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
