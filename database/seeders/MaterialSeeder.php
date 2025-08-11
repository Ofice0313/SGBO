<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $subcategorias = Subcategoria::all();

    //     if ($subcategorias->count() === 0) {
    //         $this->command->warn('Nenhuma subcategoria encontrada. Pulei o MaterialSeeder.');
    //         return;
    //     }

    //     // Cria 20 materiais com subcategoria atribuída
    //     Material::factory(20)->make()->each(function ($material) use ($subcategorias) {
    //         $material->subcategoria_id = $subcategorias->random()->id;
    //         $material->save();
    //     });
    // }

    public function run(): void
    {
        DB::table('materiais')->insert([
            [
                'titulo' => 'O Jardim Secreto',
                'tipo' => 'LIVRO',
                'autor' => 'Frances Hodgson Burnett',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAW9scT88nfg7tPfVGMU-m969uys-zf62Ec1KYzN6juEJSaMDy5WK6s7kChooh4jGpGLqz1TA4COuDVde4bUht6xkEbHspkXS4FLJ-2M75cTksUhahANF4FtRekldy0tFo4xP2kDvBJJPcu6vSoDv5U8Ek_M9A2uOyUzQSXhUX1MguZm1eOIuM9Ic0KM7ZtoQIBVgM0NDUEyzbm_cU2ZV8d-o_jEo8PY6b_uANdbLYED2A7J7md7OAIFmLTbdfq7uv8B4PBApUPXjB9',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Curso de Laravel',
                'tipo' => 'AUDIOLIVRO',
                'autor' => 'Taylor Otwell',
                'editora' => 'Laravel Press',
                'ano_de_publicacao' => 2022,
                'paginas' => 150,
                'caminho_da_imagem' => 'laravel.png',
                'caminho_do_audio' => 'laravel.mp3',
                'caminho_do_arquivo' => 'laravel.pdf',
                'status_material' => 'INDISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 2,
                'minutos' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Romance Africano',
                'tipo' => 'AUDIOLIVRO',
                'autor' => 'Mia Couto',
                'editora' => 'MozEdit',
                'ano_de_publicacao' => 2018,
                'paginas' => 0,
                'caminho_da_imagem' => 'romance.png',
                'caminho_do_audio' => 'romance.mp3',
                'caminho_do_arquivo' => null,
                'status_material' => 'INDISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 3,
                'minutos' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Álgebra Linear',
                'tipo' => 'LIVRO',
                'autor' => 'Gilbert Strang',
                'editora' => 'MIT Press',
                'ano_de_publicacao' => 2017,
                'paginas' => 450,
                'caminho_da_imagem' => 'algebra.png',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'algebra.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => false,
                'subcategoria_id' => 4,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'História Antiga',
                'tipo' => 'AUDIOLIVRO',
                'autor' => 'Heródoto',
                'editora' => 'Antiguidade',
                'ano_de_publicacao' => 2015,
                'paginas' => 500,
                'caminho_da_imagem' => 'historia.png',
                'caminho_do_audio' => 'historia.mp3',
                'caminho_do_arquivo' => 'historia.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 5,
                'minutos' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'O Jardim Fofoqueiro',
                'tipo' => 'LIVRO',
                'autor' => 'Frances Hodgson Burnett',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'kjfjfk.phj',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Orgulho e Preconceito',
                'tipo' => 'LIVRO',
                'autor' => 'Jane Austen',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'o orgulho.jpg',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'O Sol é para todos',
                'tipo' => 'LIVRO',
                'autor' => 'Harper Lee',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'o sol.jng',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => '1984',
                'tipo' => 'LIVRO',
                'autor' => 'George Orwell',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => '1904.jpg',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'O Grande Gatsby',
                'tipo' => 'LIVRO',
                'autor' => 'F. Scott Fitzgerald',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'o grande.png',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'O Jardim ',
                'tipo' => 'LIVRO',
                'autor' => 'Frances Hodgson Burnett',
                'editora' => 'Editora Ciência',
                'ano_de_publicacao' => 2020,
                'paginas' => 320,
                'caminho_da_imagem' => 'jardim.png',
                'caminho_do_audio' => null,
                'caminho_do_arquivo' => 'fisica.pdf',
                'status_material' => 'DISPONIVEL',
                'is_active' => true,
                'subcategoria_id' => 1,
                'minutos' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
