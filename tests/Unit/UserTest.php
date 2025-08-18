<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserTest extends TestCase {
    use RefreshDatabase;
    public function test_user_criacao() {
        $user = User::factory()->create(['name' => 'Teste']);
        $this->assertDatabaseHas('users', ['name' => 'Teste']);
    }
}
