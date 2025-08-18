<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class BookControllerTest extends TestCase {
    use RefreshDatabase;
    public function test_books_index() {
        $response = $this->get(route('books'));
        $response->assertStatus(200);
    }
}
