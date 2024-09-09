<?php

namespace App\Http\Controllers\Api\TimeLog;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\TimeLog\Interface\TimeLogService;
use App\Http\Controllers\Controller;
use App\Http\Request\TimeLog\TimeLogCreatedRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiCreatedTimeLogController extends Controller
{

    public function __construct(private TimeLogService $timeLogService)
    {

    }


    public function __invoke(TimeLogCreatedRequest $request): ?JsonResource
    {

        $viewModel = $this->timeLogService->createTimeLog($request->validated());

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }
        return null;
    }
}
