<?php

namespace App\Http\Resources\TimeLog;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeLogCreatedFailResource extends JsonResource
{
    public function __construct()
    {
        
    }

    public function withResponse(Request $request, JsonResponse $response)
    {
        parent::withResponse($request, $response->setStatusCode(401));
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => "Time Log failed to Created",
        ];
    }
}
