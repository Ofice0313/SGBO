<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
class SubcategoriaTest extends TestCase {
    use RefreshDatabase;
    public function test_subcategoria_criacao() {
        $categoria = Categoria::create(['nome' => 'Cat']);
        $sub = Subcategoria::create(['nome' => 'Sub', 'categoria_id' => $categoria->id]);
        $this->assertDatabaseHas('subcategorias', ['nome' => 'Sub', 'categoria_id' => $categoria->id]);
    }
}
