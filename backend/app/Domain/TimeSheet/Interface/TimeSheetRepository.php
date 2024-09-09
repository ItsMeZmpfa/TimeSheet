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

    /**
     * Check if the Record exits in The Database
     * @param  TimeSheetEntity  $timeSheetEntity
     * @return bool
     */
    public function checkIfTimeSheetExists(TimeSheetEntity $timeSheetEntity): bool;
}
