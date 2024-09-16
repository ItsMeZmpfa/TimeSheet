<?php

namespace App\Service\TimeLog;

use App\Domain\TimeLog\Interface\TimeLogFactory;
use App\Domain\TimeLog\Interface\TimeLogOutputPort;
use App\Domain\TimeLog\Interface\TimeLogRepository;
use App\Domain\TimeLog\Interface\TimeLogService;
use App\Domain\ViewModel;
use App\Events\TimeLogProcessed;
use Illuminate\Support\Facades\Log;

class TimeLogServiceImpl implements TimeLogService
{
    private TimeLogFactory $timeLogFactory;
    private TimeLogOutputPort $timeLogOutputPort;
    private TimeLogRepository $timeLogRepository;

    public function __construct(
        TimeLogFactory $timeLogFactory,
        TimeLogOutputPort $timeLogOutputPort,
        TimeLogRepository $timeLogRepository
    ) {
        $this->timeLogFactory = $timeLogFactory;
        $this->timeLogOutputPort = $timeLogOutputPort;
        $this->timeLogRepository = $timeLogRepository;
    }

    /**
     * @inheritDoc
     */
    public function createTimeLog(array $array): ViewModel
    {
        $timeLogFactory = $this->timeLogFactory->createTimeLog($array);

        if ($this->timeLogRepository->checkIfThereIsATimeLog($timeLogFactory)) {
            return $this->timeLogOutputPort->timeLogNotCreated();
        }

        $timeLog = $this->timeLogRepository->createTimeLog($timeLogFactory);

        //Create New Record for TimeSheet
        event(new TimeLogProcessed($timeLog));

        return $this->timeLogOutputPort->timeLogCreated();
    }

    /**
     * @inheritDoc
     */
    public function getLatestTimeLogRecordBaseOnDate(array $array): ViewModel
    {
        Log::info("", $array);
        $dateFactory = $this->timeLogFactory->retrieveTimeLogRecordBaseOnDate($array);

        $timeLog = $this->timeLogRepository->getLatestTimeLogBaseOnMonth($dateFactory);

        return $this->timeLogOutputPort->getTimeRecord($timeLog);
    }
}
