<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\UserModel;
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
        $adminRole = Role::where('autorizacao', 'admin')->first();
        $userRole = Role::where('autorizacao', 'usuario')->first();

        $curso1 = DB::table('cursos')->where('nome', 'Informática')->first();
        $curso2 = DB::table('cursos')->where('nome', 'Gestão')->first();
        $curso3 = DB::table('cursos')->where('nome', 'Direito')->first();

        $usuarios = [
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
                'curso_id' => $curso2->id,
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
                'curso_id' => $curso3->id,
            ],
            [
                'nome' => 'Carlos Mendes',
                'telefone' => '825678901',
                'endereco' => 'Beira',
                'status' => true,
                'email' => 'carlos@gmail.com',
                'instituicao' => 'FOCO',
                'password' => Hash::make('carlos123'),
                'created_at' => now(),
                'updated_at' => now(),
                'curso_id' => $curso1->id,
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
                'curso_id' => $curso3->id,
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
                'curso_id' => $curso2->id,
            ],
            [
                'nome' => 'Sandra Oliveira',
                'telefone' => '828901234',
                'endereco' => 'Pemba',
                'status' => true,
                'email' => 'sandra@gmail.com',
                'instituicao' => 'LORE',
                'password' => Hash::make('sandra123'),
                'created_at' => now(),
                'updated_at' => now(),
                'curso_id' => $curso1->id,
            ],
        ];

        foreach ($usuarios as $data) {
            $user = UserModel::create($data);

            // Se for o admin principal, adiciona papel admin
            if ($user->email === 'admin@gmail.com') {
                $user->roles()->attach($adminRole->id);
            } else {
                $user->roles()->attach($userRole->id);
            }
        }
    }
}
