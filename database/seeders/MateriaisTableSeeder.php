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
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'PROGRAMACAO',
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
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'PROGRAMACAO',
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
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'PROGRAMACAO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'titulo' => 'Introdução a Redes de Computadores',
                'autor' => 'Maria Souza',
                'editora' => 'Editora Tech',
                'ano_de_publicacao' => '2023',
                'caminho_do_arquivo' => 'storage/materiais/redes_computadores.pdf',
                'caminho_da_imagem' => 'storage/imagens/redes_computadores.jpg',
                'paginas' => 180,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'REDES',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Banco de Dados Relacionais',
                'autor' => 'Carlos Mendes',
                'editora' => 'DataBooks',
                'ano_de_publicacao' => '2022',
                'caminho_do_arquivo' => 'storage/materiais/banco_dados.pdf',
                'caminho_da_imagem' => 'storage/imagens/banco_dados.jpg',
                'paginas' => 250,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'BANCO DE DADOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Design de Interfaces Modernas',
                'autor' => 'Ana Paula',
                'editora' => 'Editora UI',
                'ano_de_publicacao' => '2021',
                'caminho_do_arquivo' => 'storage/materiais/design_interfaces.pdf',
                'caminho_da_imagem' => 'storage/imagens/design_interfaces.jpg',
                'paginas' => 150,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'DESIGN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Introdução à Inteligência Artificial',
                'autor' => 'Roberto Lima',
                'editora' => 'AI Books',
                'ano_de_publicacao' => '2024',
                'caminho_do_arquivo' => 'storage/materiais/introducao_ai.pdf',
                'caminho_da_imagem' => 'storage/imagens/introducao_ai.jpg',
                'paginas' => 300,
                'tipo' => 'LIVRO',
                'status' => 'ATIVO',
                'categoria' => 'TECNOLOGIA',
                'subcategoria' => 'INTELIGENCIA ARTIFICIAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
