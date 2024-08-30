<?php

namespace App\Http\Resources\Auth\Logout;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogoutFailResource extends JsonResource
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
            'message' => 'Something went wrong',
        ];
    }
}
