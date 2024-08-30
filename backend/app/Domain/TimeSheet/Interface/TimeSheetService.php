<?php

namespace App\Domain\TimeSheet\Interface;

use App\Domain\ViewModel;

interface TimeSheetService
{

    /**
     * @param  array  $array
     * @return ViewModel
     */
    public function createTimeSheet(array $array): ViewModel;
}
