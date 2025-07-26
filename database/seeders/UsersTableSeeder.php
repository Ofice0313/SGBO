<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        $materiais = Material::all();

        User::factory(40)->create()->each(function ($user) use ($roles, $materiais) {
            // Atribuir roles (1 a 3)
            $user->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Criar empréstimos para 1 a 2 materiais
            $materiaisAleatorios = $materiais->random(rand(1, 2));
            foreach ($materiaisAleatorios as $material) {
                DB::table('emprestimos')->insert([
                    'user_id' => $user->id,
                    'material_id' => $material->id,
                    'data_de_retirada' => now()->subDays(rand(1, 5)),
                    'data_de_devolucao' => now()->addDays(rand(1, 5)),
                    'multa' => 0,
                    'notificacao' => false,
                    'status_emprestimo' => 'EMPRESTADO',
                ]);
            }
        });
    }
}
