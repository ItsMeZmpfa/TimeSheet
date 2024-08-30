<?php

namespace App\Exception\Validation;

use App\Exception\Base\ApplicationException;
use Symfony\Component\HttpFoundation\Response;

class JsonEncodeException extends ApplicationException
{

    public function help(): string
    {
        return trans('exception.json_not_encoded.help');
    }

    public function error(): string
    {
        return trans('exception.json_not_encoded.error');
    }

    public function errorCode(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }
}
