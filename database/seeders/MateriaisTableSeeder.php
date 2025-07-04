<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materiais')->insert([
            [
                'titulo' => 'Laravel para Iniciantes',
                'autor' => 'João Silva',
                'editora' => 'Editora Web',
                'ano_de_publicacao' => '2024',
                'caminho_do_arquivo' => 'storage/materiais/laravel_iniciantes.pdf',
                'caminho_da_imagem' => 'storage/imagens/laravel_iniciantes.jpg',
                'paginas' => 200,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Introdução ao PHP',
                'autor' => 'Maria Oliveira',
                'editora' => 'TechBooks',
                'ano_de_publicacao' => '2023',
                'caminho_do_arquivo' => 'storage/materiais/introducao_php.pdf',
                'caminho_da_imagem' => 'storage/imagens/introducao_php.jpg',
                'paginas' => 150,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Audiolivro: Programação Básica',
                'autor' => 'Carlos Mendes',
                'editora' => 'AudioLearn',
                'ano_de_publicacao' => '2022',
                'caminho_do_arquivo' => 'storage/materiais/programacao_basica.mp3',
                'caminho_da_imagem' => 'storage/imagens/programacao_basica.jpg',
                'paginas' => 0,
                'tipo' => 'AUDIOLIVRO',
                'status' => 'ATIVO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
