<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class AuthControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_login_form() {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }
}
