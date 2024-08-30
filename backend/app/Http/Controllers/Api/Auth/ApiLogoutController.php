<?php

namespace App\Http\Controllers\Api\Auth;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Auth\Interface\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class ApiLogoutController extends Controller
{
    public function __construct(private AuthService $authService)
    {
        Log::info(__METHOD__);
    }

    public function __invoke(Request $request): ?JsonResource
    {
        $viewModel = $this->authService->logout();

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }
        return null;
    }
}
