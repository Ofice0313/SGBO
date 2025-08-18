<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class CursoControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_curso_index() {
        $response = $this->get(route('cursos.index'));
        $response->assertStatus(200);
    }
}
