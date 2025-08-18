<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class DashboardControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_dashboard_index() {
        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);
    }
}
