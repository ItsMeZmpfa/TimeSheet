<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EmployerCreatedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employerName' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
