<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(40)->create();

        // // User::factory()->create([
        // //     'nome' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);

       $this->call([
            CategoriaSeeder::class,         // 2. Categoria não depende de ninguém
            SubcategoriaSeeder::class,      // 3. Subcategoria depende de Material e Categoria (já criados)
            MaterialSeeder::class,          // 1. Material não depende de ninguém
            CursoSeeder::class,             // 4. Curso é independente
            RoleSeeder::class,              // 5. Role é independente
            UsersTableSeeder::class,        // 6. User depende de Curso
            EmprestimoSeeder::class,        // 7. Emprestimo depende de User e Material
            HistoricoDeEmprestimoSeeder::class // 8. Historico depende de Emprestimo
        ]);
    }
}
