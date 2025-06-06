<?php

namespace App\Http\Requests\v1\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,xls,xlsx,csv|max:2048', // 2MB max
        ];
    }
}