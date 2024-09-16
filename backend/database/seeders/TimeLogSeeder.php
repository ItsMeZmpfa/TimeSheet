<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\TimeLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimeLogSeeder extends Seeder
{
    public function run(): void
    {
        TimeLog::factory()->count(20)->create();
    }
}
