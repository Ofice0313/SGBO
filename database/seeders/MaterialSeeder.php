<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategorias = Subcategoria::all();

        if ($subcategorias->count() === 0) {
            $this->command->warn('Nenhuma subcategoria encontrada. Pulei o MaterialSeeder.');
            return;
        }

        // Cria 20 materiais com subcategoria atribuída
        Material::factory(20)->make()->each(function ($material) use ($subcategorias) {
            $material->subcategoria_id = $subcategorias->random()->id;
            $material->save();
        });
    }

}
