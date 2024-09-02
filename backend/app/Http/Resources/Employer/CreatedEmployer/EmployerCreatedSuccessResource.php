<?php

namespace App\Http\Resources\Employer\CreatedEmployer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployerCreatedSuccessResource extends JsonResource
{
    public function __construct()
    {

    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        parent::withResponse($request, $response->setStatusCode(201));
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => 'Employer created successfully',
        ];
    }
}
