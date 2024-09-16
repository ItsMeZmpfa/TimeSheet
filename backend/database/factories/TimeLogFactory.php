<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\TimeLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TimeLogFactory extends Factory
{
    protected $model = TimeLog::class;

    public function definition(): array
    {
        return [
            'employerId' => Employer::factory()->create()->id,
            'date' => Carbon::parse($this->faker->dateTimeBetween('+0 days', '+1 month'))->toDateTimeString(),
            'start' => "10:00:00",
            'end' => "19:00:00",
            'duration' => "10",
        ];
    }
}
