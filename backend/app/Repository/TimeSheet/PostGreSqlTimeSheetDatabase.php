<?php

namespace App\Repository\TimeSheet;

use App\Domain\TimeSheet\Interface\TimeSheetEntity;
use App\Domain\TimeSheet\Interface\TimeSheetRepository;
use App\Models\TimeSheet;
use Ramsey\Uuid\Type\Time;

class PostGreSqlTimeSheetDatabase implements TimeSheetRepository
{

    /**
     * @inheritDoc
     */
    public function createTimeSheet(TimeSheetEntity $timeSheet): TimeSheetEntity
    {

        return TimeSheet::create([
            'employerId' => $timeSheet->getEmployerId(),
            'timeLogId' => $timeSheet->getTimeLogId(),
            'startDate' => $timeSheet->getStartDate()->toString(),
            'endDate' => $timeSheet->getEndDate()->toString(),
            'submit_status' => $timeSheet->getSubmitStatus(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function checkIfTimeSheetExists(TimeSheetEntity $timeSheetEntity): bool
    {

    }
}
