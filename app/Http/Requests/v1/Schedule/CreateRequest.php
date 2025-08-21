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
            'file_pdf' => [
                'required',
                'file',
                'mimetypes:application/pdf',
                'max:2048',
                function ($attribute, $value, $fail) {
                    $filename = $value->getClientOriginalName();
                    // Faqat 1-11 sinf va bitta A-Z harf (masalan: 1A.pdf, 10B.pdf, 11C.pdf)
                    if (!preg_match('/^(?:[1-9]|10|11)[A-Z]\.pdf$/', $filename)) {
                        $fail("The $attribute must be named like '1A.pdf', '5B.pdf' or '11C.pdf'.");
                    }
                },
            ],
            'file_xls' => [
                'sometimes',
                'file',
                'mimetypes:mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'max:2048',
                function ($attribute, $value, $fail) {
                    $filename = $value->getClientOriginalName();
                    if (!preg_match('/^(?:[1-9]|10|11)[A-Z]\.xls$/', $filename)) {
                        $fail("The $attribute must be named like '1A.xls', '5B.xls' or '11C.xls'.");
                    }
                    if (!preg_match('/^(?:[1-9]|10|11)[A-Z]\.xlsx$/', $filename)) {
                        $fail("The $attribute must be named like '1A.xlsx', '5B.xlsx' or '11C.xlsx'.");
                    }
                },
            ],
            'file_csv' => [
                'sometimes',
                'file',
                'mimetypes:mimetypes:text/csv,application/vnd.ms-excel',
                'max:2048',
                function ($attribute, $value, $fail) {
                    $filename = $value->getClientOriginalName();
                    if (!preg_match('/^(?:[1-9]|10|11)[A-Z]\.csv$/', $filename)) {
                        $fail("The $attribute must be named like '1A.csv', '5B.csv' or '11C.csv'.");
                    }
                },
            ],
        ];
    }
}