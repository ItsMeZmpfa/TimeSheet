<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class DateValueObject
{
    private Carbon $date;

    public function __construct(string $date)
    {

        $this->date = Carbon::createFromFormat('Y-m-d H:i:s', $date);

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
}
