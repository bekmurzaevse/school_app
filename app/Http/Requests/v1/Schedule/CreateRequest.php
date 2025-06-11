<?php

namespace App\Http\Requests\v1\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'description' => 'nullable|string|max:255',
            'file_pdf' => 'required|file|mimes:pdf|max:2048',
            'file_xls' => 'nullable|file|mimes:xls,xlsx|max:2048',
            'file_csv' => 'nullable|file|mimes:csv|max:2048',
        ];
    }
}