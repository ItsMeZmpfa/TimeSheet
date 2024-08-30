<?php

namespace App\Http\Controllers\Api\Auth;


use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Auth\Interface\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LoginRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class ApiLoginController extends Controller
{
    public function __construct(private AuthService $authService)
    {
        Log::info(__METHOD__);

    }

    public function __invoke(LoginRequest $request): ?JsonResource
    {

        $viewModel = $this->authService->login($request->validated());

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }
        return null;
    }
}
