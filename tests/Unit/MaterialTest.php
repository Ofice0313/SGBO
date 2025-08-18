<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
class MaterialTest extends TestCase {
    use RefreshDatabase;
    public function test_material_criacao() {
        $sub = Subcategoria::factory()->create();
        $mat = Material::create([
            'titulo' => 'Livro',
            'autor' => 'Autor',
            'subcategoria_id' => $sub->id,
            'status_material' => 'DISPONIVEL',
            'editora' => 'Editora',
            'ano_de_publicacao' => 2025,
            'paginas' => 100
        ]);
        $this->assertDatabaseHas('materiais', ['titulo' => 'Livro', 'subcategoria_id' => $sub->id]);
    }
}
