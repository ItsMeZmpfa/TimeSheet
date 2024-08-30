<?php

namespace App\Exception;

use App\Exception\Validation\JsonEncodeException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Throwable;

class Error implements Arrayable, JsonSerializable, Jsonable
{

    public function __construct(private readonly string $help = '', private readonly string $error = '')
    {
    }

    /**
     * @throws Throwable
     */
    public function toJson($options = 0.0): false|string
    {
        $jsonEncoded = json_encode($this->jsonSerialize(), $options);
        throw_unless($jsonEncoded, JsonEncodeException::class);
        return $jsonEncoded;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'error' => $this->error,
            'help' => $this->help,
        ];
    }
}
