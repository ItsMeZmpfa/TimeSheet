<?php

namespace App\Exception\Validation;

use App\Exception\Base\ApplicationException;
use Symfony\Component\HttpFoundation\Response;

class ValidationInput extends ApplicationException
{

    public function help(): string
    {
        return trans("Check if the given input is valid");
    }

    public function error(): string
    {
        return trans("Something went wrong with Input Your provide");
    }

    public function errorCode(): int
    {
        //Http Status Code 422
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }
}
