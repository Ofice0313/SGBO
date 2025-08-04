<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role_user')->truncate();

        // Pega as roles específicas (primeira encontrada com base no valor)
        $admin = Role::where('role', 'ADMIN')->first();
        $user = Role::where('role', 'USER')->first();

        // Pega os usuários (baseado nos emails que inseriste)
        $ana = User::where('email', 'ana@gmail.com')->first();
        $carlos = User::where('email', 'carlos@gmail.com')->first();
        $dina = User::where('email', 'dina@gmail.com')->first();
        $eduardo = User::where('email', 'eduardo@gmail.com')->first();
        $fatima = User::where('email', 'fatima@gmail.com')->first();

        // Associa os papéis aos usuários
        $ana->roles()->attach($admin->id);     // Ana = admin
        $carlos->roles()->attach($user->id);   // Carlos = user
        $dina->roles()->attach($user->id);     // Dina = user
        $eduardo->roles()->attach($admin->id); // Eduardo = admin
        $fatima->roles()->attach($user->id);   // Fátima = user

    }
}
