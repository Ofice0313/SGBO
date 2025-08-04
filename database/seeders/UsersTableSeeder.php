<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $roles = Role::all();
    //     $materiais = Material::all();

    //     User::factory(40)->create()->each(function ($user) use ($roles, $materiais) {
    //         // Atribuir roles (1 a 3)
    //         $user->roles()->attach(
    //             $roles->random(rand(1, 3))->pluck('id')->toArray()
    //         );

    //         // Criar empréstimos para 1 a 2 materiais
    //         $materiaisAleatorios = $materiais->random(rand(1, 2));
    //         foreach ($materiaisAleatorios as $material) {
    //             DB::table('emprestimos')->insert([
    //                 'user_id' => $user->id,
    //                 'material_id' => $material->id,
    //                 'data_de_retirada' => now()->subDays(rand(1, 5)),
    //                 'data_de_devolucao' => now()->addDays(rand(1, 5)),
    //                 'multa' => 0,
    //                 'notificacao' => false,
    //                 'status_emprestimo' => 'EMPRESTADO',
    //             ]);
    //         }
    //     });
    // }

    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nome' => 'Ana Silva',
                'email' => 'ana@gmail.com',
                'endereco' => 'Maputo',
                'instituicao' => 'LORE',
                'telefone' => '840000001',
                'status' => 'ATIVO',
                'password' => Hash::make('ana123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Carlos Mendes',
                'email' => 'carlos@gmail.com',
                'endereco' => 'Beira',
                'instituicao' => 'FOCO',
                'telefone' => '840000002',
                'status' => 'ATIVO',
                'password' => Hash::make('carlos123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Dina Costa',
                'email' => 'dina@gmail.com',
                'endereco' => 'Nampula',
                'instituicao' => 'ISLORE',
                'telefone' => '840000003',
                'status' => 'ATIVO',
                'password' => Hash::make('dina123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Eduardo Jorge',
                'email' => 'eduardo@gmail.com',
                'endereco' => 'Quelimane',
                'instituicao' => 'FOCO',
                'telefone' => '840000004',
                'status' => 'INATIVO',
                'password' => Hash::make('eduardo123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Fátima Lopes',
                'email' => 'fatima@gmail.com',
                'endereco' => 'Chimoio',
                'instituicao' => 'LORE',
                'telefone' => '840000005',
                'status' => 'ATIVO',
                'password' => Hash::make('fatima123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
