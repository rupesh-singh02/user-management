<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Create a test user
        $user = User::factory()->create();

        // Log the user in
        $response = $this->actingAs($user)->get('/');

        // Assert that the status code is 200
        $response->assertStatus(200);
    }
}
