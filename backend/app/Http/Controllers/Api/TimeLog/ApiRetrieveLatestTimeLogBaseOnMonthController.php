<?php

namespace App\Http\Controllers\Api\TimeLog;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\TimeLog\Interface\TimeLogService;
use App\Http\Controllers\Controller;
use App\Http\Request\TimeLog\TimeLogDateRangeRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiRetrieveLatestTimeLogBaseOnMonthController extends Controller
{

    public function __construct(private TimeLogService $timeLogService)
    {
    }

    public function __invoke(TimeLogDateRangeRequest $request): ?JsonResource
    {
        $viewModel = $this->timeLogService->getLatestTimeLogRecordBaseOnDate($request->validated());

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }
        return null;
    }
}
