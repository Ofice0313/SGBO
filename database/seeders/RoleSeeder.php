<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['role' => 'ADMIN', 'descricao' => 'Administrador do sistema', 'autorizacao' => 'FULL', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'USER', 'descricao' => 'Usuário normal', 'autorizacao' => 'LIMITED', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'ADMIN', 'descricao' => 'Moderador de conteúdo', 'autorizacao' => 'MEDIUM', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'ADMIN', 'descricao' => 'Gestor de biblioteca', 'autorizacao' => 'ALTO', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'USER', 'descricao' => 'Usuário estudante', 'autorizacao' => 'BÁSICO', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
