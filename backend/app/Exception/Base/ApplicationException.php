<?php

namespace App\Exception\Base;

use Error;
use Illuminate\Http\Request;

abstract class ApplicationException extends \Exception
{
    public function render(Request $request): \Illuminate\Http\Response
    {
        $error = new Error($this->help(), $this->error());
        return response($error, $this->errorCode());
    }

    abstract public function help(): string;

    abstract public function error(): string;

    abstract public function errorCode(): int;
}
