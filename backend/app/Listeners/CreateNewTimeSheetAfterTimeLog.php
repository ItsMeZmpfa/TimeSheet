<?php

namespace App\Listeners;

use App\Domain\TimeLog\Interface\TimeLogService;
use App\Domain\TimeSheet\Interface\TimeSheetService;
use App\Events\TimeLogProcessed;
use App\Models\TimeLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewTimeSheetAfterTimeLog
{
    /**
     * Create the event listener.
     */
    public function __construct(private TimeSheetService $timeSheetService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TimeLogProcessed $event): void
    {
        $this->timeSheetService->createTimeSheet(
            [
                "employerId" => $event->timeLog->getEmployerId(),
                "timeLogId" => $event->timeLog->getId(),
                "startDate" => $event->timeLog->getDate(),
                "endDate" => $event->timeLog->getDate(),
                'submitStatus' => true,
            ]
        );
    }
}
