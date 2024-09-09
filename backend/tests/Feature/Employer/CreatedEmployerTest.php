<?php

namespace Tests\Feature\Employer;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreatedEmployerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    #[Test]
    public function createdEmployerTest(): void
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson(route('createdEmployer',
            ['employerName' => 'Test Test']))->assertStatus(201);

        $response->assertJsonFragment([
            'message' => 'Employer created successfully',
        ]);

        $this->assertDatabaseHas('employers', ['employerName' => 'Test Test']);

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    private function createUser()
    {

        $user = User::factory()->create();
        return Sanctum::actingAs($user, ['*']);
    }
}
