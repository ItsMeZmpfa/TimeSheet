<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\TimeLog;
use App\Models\TimeSheet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeSheetFactory extends Factory
{
    protected $model = TimeSheet::class;

    public function definition(): array
    {
        return [
            
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'submit_status' => true,
            'approved_status' => false,
        ];
    }
}
