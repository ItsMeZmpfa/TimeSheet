<?php

namespace App\Service\TimeSheet;

use App\Domain\TimeSheet\Interface\TimeSheetEntity;
use App\Domain\TimeSheet\Interface\TimeSheetFactory;
use App\Domain\TimeSheet\Interface\TimeSheetOutputPort;
use App\Domain\TimeSheet\Interface\TimeSheetRepository;
use App\Domain\TimeSheet\Interface\TimeSheetService;
use App\Domain\ViewModel;

class TimeSheetServiceImpl implements TimeSheetService
{


    public function __construct(
        private TimeSheetRepository $timeSheetRepository,
        private TimeSheetFactory $timeSheetFactory,
        private TimeSheetOutputPort $timeSheetOutputPort,
    ) {

    }


    /**
     * @inheritDoc
     */
    public function createTimeSheet(array $array): ViewModel
    {

        $timeSheet = $this->timeSheetFactory->createTimeSheet($array);
        
        $this->timeSheetRepository->createTimeSheet($timeSheet);

        return $this->timeSheetOutputPort->timeSheetCreated();
    }
}
