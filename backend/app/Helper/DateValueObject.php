<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class DateValueObject
{
    private Carbon $date;

    public function __construct(string $date)
    {

        $this->date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->setTimezone('Europe/Berlin');

    }

    public function __toString()
    {
        return $this->date->toDateTimeString();
    }

    public function isEqualTo(self $newDate): bool
    {
        return $this->date->toDateTimeString() === $newDate->date->toDateTimeString();
    }

    public function toString(): string
    {
        return $this->date->toDateTimeString();
    }

    public function getDate(): string
    {
        return $this->date->toDateTimeString();
    }

    public function getTime(): string
    {
        return $this->date->toTimeString();
    }

    public function getTimeDiffInHour(DateValueObject $dateToDiff): string
    {
        return $this->date->diffInHours($dateToDiff->getDate());
    }

    public function getDateObject()
    {
        return $this->date;
    }
}
