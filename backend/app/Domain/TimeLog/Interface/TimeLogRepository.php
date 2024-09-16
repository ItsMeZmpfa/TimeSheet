<?php

namespace App\Domain\TimeLog\Interface;

use Illuminate\Support\Collection;

interface TimeLogRepository
{

    /**
     *Create a TimeLog Record in the Database
     * @param  TimeLogEntity  $timeLog
     * @return TimeLogEntity
     */
    public function createTimeLog(TimeLogEntity $timeLog): TimeLogEntity;

    /**
     * Check if the given Parameter are already exists in The Database
     * @param  TimeLogEntity  $timeLog
     * @return bool
     */
    public function checkIfThereIsATimeLog(TimeLogEntity $timeLog): bool;

    /**
     * Get The Latest Record Collection of The TimeLog Base On Date
     * @param  TimeLogEntity  $timeLog
     * @return Collection
     */
    public function getLatestTimeLogBaseOnMonth(array $dateRange): Collection;
}
