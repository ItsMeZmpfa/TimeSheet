<?php

namespace App\Service\Auth;

use App\Domain\Auth\Interface\AuthOutputPort;
use App\Domain\Auth\Interface\AuthService;
use App\Domain\User\Interface\UserFactory;
use App\Domain\User\Interface\UserRepository;
use App\Domain\ViewModel;
use App\Helper\PasswordValueObject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthServiceImpl implements AuthService
{
    private UserRepository $userRepository;
    private UserFactory $userFactory;

    private $token;

    public function __construct(
        protected UserFactory $factory,
        protected UserRepository $repository,
        protected AuthOutputPort $outputPort,
    ) {
        $this->userRepository = $repository;
        $this->userFactory = $factory;

        Log::info("AuthServiceImpl start");
    }

    public function login(array $credentials): ViewModel
    {
        Log::warning("User is trying to login", $credentials);

        $user = $this->userFactory->getUser([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);


        if (!$this->userRepository->existsByEmail($user)) {
            Log::error("User can't login with invalid email");
            return $this->outputPort->loginFail();
        }


        $user = $this->userRepository->findUserbyEmail($user);

        if (!$user->getUserPassword()->check(new PasswordValueObject($credentials['password']))) {
            Log::error("User can't login with invalid password");

            return $this->outputPort->loginFail();
        }

        $this->token = $user->createToken('applicationToken')->plainTextToken;

        Log::info("User is login success");

        return $this->outputPort->loginSuccess($this->token);
    }

    public function logout(): ViewModel
    {
        Log::info("User is trying to logout");
        if (!auth('sanctum')->check()) {
            Log::error("User can't logout because isn't authenticated");
            return $this->outputPort->loginFail();
        }

        Auth::guard('sanctum')->user()->currentAccessToken()->delete();

        Log::info("User logout succussfully");
        return $this->outputPort->logoutSuccess();
    }
}
