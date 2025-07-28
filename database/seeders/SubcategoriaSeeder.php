<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cria 3 subcategorias para cada categoria existente
        Categoria::all()->each(function ($categoria) {
            Subcategoria::factory(3)->create([
                'categoria_id' => $categoria->id,
            ]);
        });
    }
}
