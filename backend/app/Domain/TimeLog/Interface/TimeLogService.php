<?php

namespace App\Domain\TimeLog\Interface;

use App\Domain\ViewModel;

interface TimeLogService
{

    /**
     * @param  array  $array
     * @return ViewModel
     */
    public function createTimeLog(array $array): ViewModel;
}
