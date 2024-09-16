<?php

namespace App\Repository\TimeLog;

use App\Domain\TimeLog\Interface\TimeLogEntity;
use App\Domain\TimeLog\Interface\TimeLogRepository;
use App\Models\TimeLog;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Time;

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

    /**
     * @param  array  $dateRange
     * @inheritDoc
     */
    public function getLatestTimeLogBaseOnMonth(array $dateRange): Collection
    {
        return TimeLog::query()
            ->leftJoin('employers', 'employers.id', '=', 'time_logs.employerId')
            ->select("date", DB::raw("CONCAT(time_logs.start,'-',time_logs.end) as Uhrzeit"),
                "employers.employerName",
                "duration")
            ->from("time_logs")
            ->whereBetween("date", [$dateRange['startDate']->toString(), $dateRange['endDate']->toString()])
            ->orderBy("date")
            ->get();
    }
}
