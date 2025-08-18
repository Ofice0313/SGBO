<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CursoTest extends TestCase {
    use RefreshDatabase;
    public function test_curso_criacao() {
        $curso = Curso::create(['nome' => 'Curso Teste']);
        $this->assertDatabaseHas('cursos', ['nome' => 'Curso Teste']);
    }
}
