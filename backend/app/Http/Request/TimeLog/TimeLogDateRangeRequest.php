<?php

namespace App\Http\Request\TimeLog;

use Illuminate\Foundation\Http\FormRequest;

class TimeLogDateRangeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
