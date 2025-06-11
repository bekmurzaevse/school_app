<?php

namespace App\Http\Requests\v1\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class DownloadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'format' => 'nullable|in:pdf,xls,xlsx,csv',
        ];
    }
}