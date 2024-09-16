<?php

namespace App\Domain\TimeLog\Interface;

interface TimeLogFactory
{

    /**
     * Create The Factory Object for the TimeLog
     * @param  array  $attributes
     * @return TimeLogEntity
     */
    public function createTimeLog(array $attributes = []): TimeLogEntity;

    /**
     * @return array
     */
    public function retrieveTimeLogRecordBaseOnDate(): array;
}
