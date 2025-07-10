<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['autorizacao' => 'admin']);
        $userRole = Role::create(['autorizacao' => 'usuario']);

        $usuario = UserModel::create([
            'name' => 'João Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $usuario->roles()->attach($adminRole->id);

        $usuario2 = UserModel::create([
            
        ]);

        $usuario2->roles()->attach($userRole->id);

    }
}
