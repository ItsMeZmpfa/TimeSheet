<?php

namespace App\Repository\TimeLog;

use App\Domain\TimeLog\Interface\TimeLogEntity;
use App\Domain\TimeLog\Interface\TimeLogRepository;
use App\Models\TimeLog;

class PostGreSqlTimeLogDatabase implements TimeLogRepository
{

    /**
     * @inheritDoc
     */
    public function createTimeLog(TimeLogEntity $timeLog): TimeLogEntity
    {
        return TimeLog::create([
            'date' => $timeLog->getDate(),
            'start' => $timeLog->getStartTime(),
            'end' => $timeLog->getEndTime(),
            'employerId' => $timeLog->getEmployerId(),
            'duration' => $timeLog->getDuration(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function checkIfThereIsATimeLog(TimeLogEntity $timeLog): bool
    {
        return TimeLog::where([
            'date' => $timeLog->getDate(),
        ])->exists();
    }
}
