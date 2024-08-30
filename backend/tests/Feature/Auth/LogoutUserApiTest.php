<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutUserApiTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function testLogoutUser()
    {
        //make an Api call with acting as a user for sanctum guard
        $response = $this->actingAs($this->user, 'sanctum')->postJson(route('logout'))->assertStatus(201);

        $response->assertJsonFragment([
            'message' => 'Logged out successfully',
        ]);

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    private function createUser()
    {
        return Sanctum::actingAs(User::factory()->create(), ['*']);
    }
}
