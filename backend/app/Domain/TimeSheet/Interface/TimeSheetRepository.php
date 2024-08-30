<?php

namespace App\Domain\TimeSheet\Interface;

use App\Domain\TimeLog\Interface\TimeLogEntity;

interface TimeSheetRepository
{
    /**
     *Create a TimeLog Record in the Database
     * @param  TimeSheetEntity  $timeSheet
     * @return TimeSheetEntity
     */
    public function createTimeSheet(TimeSheetEntity $timeSheet): TimeSheetEntity;
}
