<?php

namespace App\Adapters\Presenter\Auth;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Http\Resources\Auth\Logout\LogoutFailResource;
use App\Http\Resources\Auth\Logout\LogoutSuccusfullyResource;
use App\Domain\Auth\Interface\AuthOutputPort;
use App\Domain\ViewModel;
use App\Http\Resources\Auth\Login\LoginFailResource;
use App\Http\Resources\Auth\Login\LoginSuccusfullyResource;
use Illuminate\Support\Facades\Log;


class AuthJsonPresenter implements AuthOutputPort
{
    public function __construct()
    {
        Log::info("Auth Json Presenter generate and sent");
    }


    /**
     * @inheritDoc
     */
    public function loginSuccess(string $token): ViewModel
    {
        Log::info("Auth Json Presenter login succussfully");
        return new JsonResourceViewModel(
            new LoginSuccusfullyResource($token)
        );
    }

    /**
     * @inheritDoc
     */
    public function loginFail(): ViewModel
    {
        Log::info("Auth Json Presenter login fail");
        return new JsonResourceViewModel(
            new LoginFailResource()
        );
    }

    /**
     * @inheritDoc
     */
    public function logoutSuccess(): ViewModel
    {
        return new JsonResourceViewModel(
            new LogoutSuccusfullyResource()
        );
    }

    /**
     * @inheritDoc
     */
    public function logoutFail(): ViewModel
    {
        return new JsonResourceViewModel(
            new LogoutFailResource()
        );
    }
}
