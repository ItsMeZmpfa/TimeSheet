<?php

namespace App\Exception\Generator;

use App\Exception\Base\ApplicationException;
use Symfony\Component\HttpFoundation\Response;

class GeneratorException extends ApplicationException
{

    public function help(): string
    {
        return trans('exception.generator.help');
    }

    public function error(): string
    {
        return trans('exception.generator.error');
    }

    public function errorCode(): int
    {
        return Response::HTTP_SERVICE_UNAVAILABLE;
    }
}
