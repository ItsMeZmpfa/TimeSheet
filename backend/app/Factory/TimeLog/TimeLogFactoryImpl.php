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
}
