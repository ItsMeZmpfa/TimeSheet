<?php

namespace App\Http\Resources\Employer\CreatedEmployer;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployerCreatedFailResource extends JsonResource
{
    public function __construct()
    {

    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        parent::withResponse($request, $response->setStatusCode(401));
    }
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Employer Created Fail'
        ];
    }
}
