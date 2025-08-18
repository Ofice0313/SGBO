<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
class RoleTest extends TestCase {
    use RefreshDatabase;
    public function test_role_criacao() {
        $role = Role::create(['nome' => 'Admin']);
        $this->assertDatabaseHas('roles', ['nome' => 'Admin']);
    }
}
