<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('usuarios')->insert([
            [
                'nome' => 'João Silva',
                'telefone' => '823456789',
                'endereco' => 'Maputo',
                'status' => false,
                'email' => 'admin@gmail.com',
                'instituicao' => 'ISLORE',
                'password' => Hash::make('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maria Santos',
                'telefone' => '824567890',
                'endereco' => 'Matola',
                'status' => true,
                'email' => 'mariasantos@gmail.com',
                'instituicao' => 'LORE',
                'password' => Hash::make('maria123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Carlos Mendes',
                'telefone' => '825678901',
                'endereco' => 'Beira',
                'status' => true,
                'email' => 'carlos.mendes@example.com',
                'instituicao' => 'FOCO',
                'password' => Hash::make('carlos123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Ana Paula',
                'telefone' => '826789012',
                'endereco' => 'Nampula',
                'status' => false,
                'email' => 'ana@gmail.com',
                'instituicao' => 'ISLORE',
                'password' => Hash::make('ana123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Roberto Lima',
                'telefone' => '827890123',
                'endereco' => 'Quelimane',
                'status' => true,
                'email' => 'robertolima@gmail.com',
                'instituicao' => 'FOCO',
                'password' => Hash::make('roberto123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
