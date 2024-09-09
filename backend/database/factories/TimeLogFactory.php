<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\TimeLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeLogFactory extends Factory
{
    protected $model = TimeLog::class;

    public function definition(): array
    {
        return [
            'employerId' => Employer::factory()->create()->id,
            'date' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'start' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'end' => fake()->dateTime()->format('Y-m-d H:i:s'),
            'duration' => "10",
        ];
    }
}
