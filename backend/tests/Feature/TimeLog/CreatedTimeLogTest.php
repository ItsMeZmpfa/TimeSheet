<?php

namespace Tests\Feature\TimeLog;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreatedTimeLogTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Employer $employer;

    #[Test]
    public function createdTimeLogTest()
    {

        $response = $this->actingAs($this->user, 'sanctum')->postJson(route('createdTimeLog',
            [
                'employerId' => $this->employer->id,
                'date' => '2024-09-04 00:00:00',
                'start' => '2024-09-04 10:00:00',
                'end' => '2024-09-04 19:00:00',
            ]))->assertStatus(201);

        $response->assertJsonFragment([
            'message' => 'Time Log created successfully',
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
        $this->employer = $this->createEmployer();
    }

    private function createUser()
    {

        $user = User::factory()->create();
        return Sanctum::actingAs($user, ['*']);
    }

    private function createEmployer()
    {
        return Employer::factory()->create();
    }
}
