<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run()
    {
        Categoria::factory(5)->create(); // cria 5 categorias
    }
}
