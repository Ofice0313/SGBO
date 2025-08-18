<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CategoriaTest extends TestCase {
    use RefreshDatabase;
    public function test_categoria_criacao() {
        $categoria = Categoria::create(['nome' => 'Teste']);
        $this->assertDatabaseHas('categorias', ['nome' => 'Teste']);
    }
}
