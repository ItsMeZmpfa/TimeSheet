<?php

namespace App\Http\Resources\TimeLog;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeLogRetrieveResource extends JsonResource
{
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        parent::withResponse($request, $response->setStatusCode(201)); // TODO: Change the autogenerated stub
    }

    public function toArray(Request $request): array
    {
        return [
            "employerRecord" => $this->collection,
        ];
    }
}
