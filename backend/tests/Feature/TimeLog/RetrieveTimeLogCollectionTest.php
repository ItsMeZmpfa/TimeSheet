<?php

namespace Tests\Feature\TimeLog;

use App\Models\Employer;
use App\Models\TimeLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class RetrieveTimeLogCollectionTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private TimeLog $timeLog;

    public function testRetrieveTimeLogCollection()
    {
        $response = $this->actingAs($this->user,
            'sanctum')->getJson(route('getLatestTimeLogRecords',
            ['startDate' => '2024-01-01 00:00:00', 'endDate' => '2024-12-31 00:00:00']))->assertStatus(201);

        $response->assertJsonStructure([
            'employerRecord'
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
        $this->createTimeLog();

    }

    private function createUser()
    {

        $user = User::factory()->create();
        return Sanctum::actingAs($user, ['*']);
    }


    private function createTimeLog()
    {
        return TimeLog::factory(20)->create();
    }
}
