<?php

namespace App\Http\Request\TimeLog;

use Illuminate\Foundation\Http\FormRequest;

class TimeLogCreatedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employerId' => 'required|integer|exists:employers,id',
            'date' => 'required|date',
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
