<?php

namespace App\Domain\TimeSheet\Interface;

use App\Domain\ViewModel;

interface TimeSheetOutputPort
{

    /**
     *
     * @return ViewModel
     */
    public function timeSheetCreated(): ViewModel;
}
