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
            'file_pdf' => 'required|file|mimes:pdf|max:2048',
            'file_xls' => 'nullable|file|mimes:xls,xlsx|max:2048',
            'file_csv' => 'nullable|file|mimes:csv,txt|max:2048',
        ];
    }
}
