<?php

namespace App\Domain\TimeSheet\Interface;

interface TimeSheetFactory
{
    /**
     * Create The Factory Object of TimeSheetEntity
     * @param  array  $attributes
     * @return TimeSheetEntity
     */
    public function createTimeSheet(array $attributes = []): TimeSheetEntity;
}
