<?php

namespace App\Helper;

class EmailValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            //Todo Throw Custom userCoreException
        }

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $email): bool
    {
        return $this->value == $email->value;
    }
}
