<?php

namespace App\Factory\TimeLog;

use App\Domain\TimeLog\Interface\TimeLogEntity;
use App\Domain\TimeLog\Interface\TimeLogFactory;
use App\Helper\DateValueObject;
use App\Models\TimeLog;

class TimeLogFactoryImpl implements TimeLogFactory
{

    /**
     * @inheritDoc
     */
    public function createTimeLog(array $attributes = []): TimeLogEntity
    {
        if (isset($attributes['date']) && is_string($attributes['date'])) {
            $attributes['date'] = new DateValueObject($attributes['date']);
        }

        if (isset($attributes['start']) && is_string($attributes['start'])) {
            $attributes['start'] = new DateValueObject($attributes['start']);
        }

        if (isset($attributes['end']) && is_string($attributes['end'])) {
            $attributes['end'] = new DateValueObject($attributes['end']);
        }

        $attributes['duration'] = $attributes['start']->getTimeDiffInHour($attributes['end']);

        return new TimeLog($attributes);
    }

    /**
     * @inheritDoc
     */
    public function retrieveTimeLogRecordBaseOnDate(array $attributes = []): array
    {
        if (isset($attributes['startDate']) && is_string($attributes['startDate'])) {
            $attributes['startDate'] = new DateValueObject($attributes['startDate']);
        }

        if (isset($attributes['endDate']) && is_string($attributes['endDate'])) {
            $attributes['endDate'] = new DateValueObject($attributes['endDate']);
        }

        return $attributes;
    }
}
