<?php

namespace App\Domain\TimeLog\Interface;

interface TimeLogRepository
{

    /**
     *Create a TimeLog Record in the Database
     * @param  TimeLogEntity  $timeLog
     * @return TimeLogEntity
     */
    public function createTimeLog(TimeLogEntity $timeLog): TimeLogEntity;
}
