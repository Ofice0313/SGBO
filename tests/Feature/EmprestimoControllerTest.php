<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class EmprestimoControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_emprestimo_index() {
        $response = $this->get(route('emprestimos.index'));
        $response->assertStatus(200);
    }
}
