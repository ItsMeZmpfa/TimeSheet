<?php

namespace App\Http\Controllers\Api\Employer;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Employer\Interface\EmployerService;
use App\Http\Controllers\Controller;
use App\Http\Request\Employer\EmployerCreatedRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiCreatedEmployerController extends Controller
{
    public function __construct(private EmployerService $employerService)
    {

    }

    public function __invoke(EmployerCreatedRequest $request): ?JsonResource
    {
        $viewModel = $this->employerService->createEmployer($request->validated());

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }
        return null;
    }
}
