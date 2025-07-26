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
        // Garante que existam categorias e materiais para relacionar
        if (Categoria::count() === 0) {
            Categoria::factory()->count(10)->create();
        }
        if (Material::count() === 0) {
            Material::factory()->count(20)->create();
        }

        Subcategoria::factory()->count(30)->create();
    }
}
