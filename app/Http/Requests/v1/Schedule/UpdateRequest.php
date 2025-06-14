<?php

namespace App\Http\Requests\v1\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Summary of rules
     * @return array{description: string, file: string}
     */
    public function rules(): array
    {
        return [
            'description' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,xls,xlsx,csv|max:2048',
        ];
    }
}
