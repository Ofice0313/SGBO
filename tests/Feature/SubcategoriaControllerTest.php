<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;

class SubcategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_subcategoria_retorna_back_com_mensagem()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->post(route('subcategorias.store'), [
            'nome' => 'Subcategoria Teste',
            'categoria_id' => $categoria->id,
        ]);
        $response->assertSessionHas('success', 'Subcategoria criada com sucesso!');
        $response->assertRedirect();
    }

    public function test_update_subcategoria_retorna_back_com_mensagem()
    {
        $categoria = Categoria::factory()->create();
        $subcategoria = Categoria::factory()->create();
        $response = $this->put(route('subcategorias.update', $subcategoria->id), [
            'nome' => 'Subcategoria Editada',
            'categoria' => null,
        ]);
        $response->assertSessionHas('success', 'Subcategoria atualizada com sucesso!');
        $response->assertRedirect();
    }

    public function test_edit_subcategoria_retorna_back_com_mensagem()
    {
        $subcategoria = Categoria::factory()->create();
        $response = $this->get(route('subcategorias.edit', $subcategoria->id));
        $response->assertSessionHas('success', 'Subcategoria carregada para edição!');
        $response->assertRedirect();
    }
}
