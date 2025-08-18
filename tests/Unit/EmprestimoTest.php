<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
class EmprestimoTest extends TestCase {
    use RefreshDatabase;
    public function test_emprestimo_criacao() {
        $user = User::factory()->create();
        $material = Material::factory()->create();
        $emp = Emprestimo::create([
            'user_id' => $user->id,
            'material_id' => $material->id,
            'data_emprestimo' => now(),
            'data_devolucao' => now()->addDays(7)
        ]);
        $this->assertDatabaseHas('emprestimos', ['user_id' => $user->id, 'material_id' => $material->id]);
    }
}
