<?php

namespace App\Factory\TimeSheet;

use App\Domain\TimeSheet\Interface\TimeSheetEntity;
use App\Domain\TimeSheet\Interface\TimeSheetFactory;
use App\Models\TimeSheet;

class TimeSheetFactoryImpl implements TimeSheetFactory
{

    /**
     * @inheritDoc
     */
    public function createTimeSheet(array $attributes = []): TimeSheetEntity
    {
        return new TimeSheet($attributes);
    }
}
