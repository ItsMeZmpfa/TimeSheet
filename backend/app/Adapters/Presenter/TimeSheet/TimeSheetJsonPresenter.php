<?php

namespace App\Adapters\Presenter\TimeSheet;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\TimeSheet\Interface\TimeSheetOutputPort;
use App\Domain\ViewModel;
use App\Http\Resources\TimeLog\TimeLogCreatedSuccessResource;
use App\Http\Resources\TimeSheet\TimeSheetCreatedSuccessResource;
use App\Models\TimeSheet;

class TimeSheetJsonPresenter implements TimeSheetOutputPort
{


    /**
     * @inheritDoc
     */
    public function timeSheetCreated(): ViewModel
    {
        return new JsonResourceViewModel(
            new TimeLogCreatedSuccessResource()
        );
    }
}
