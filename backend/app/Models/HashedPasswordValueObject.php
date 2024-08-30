<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

class HashedPasswordValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $info = Hash::info($value);

        if (!isset($info['algo']) && $info['algoName'] == 'unknown') {
            //Throw Custom Exception
        }

        $this->value = $value;
    }

    public static function hash(PasswordValueObject $password): self
    {
        return new self(
            Hash::make((string)$password, 'sha512')
        );
    }

    public function __toString()
    {
        return $this->value;
    }

    public function isEqualTo(self $hashed): bool
    {
        return $this->value == $hashed->value;
    }

    public function check(PasswordValueObject $password): bool
    {
        return Hash::check((string)$password, $this->value);
    }
}
