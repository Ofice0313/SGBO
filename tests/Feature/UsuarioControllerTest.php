<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class UsuarioControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_usuario_index() {
        $response = $this->get(route('usuarios.index'));
        $response->assertStatus(200);
    }
}
