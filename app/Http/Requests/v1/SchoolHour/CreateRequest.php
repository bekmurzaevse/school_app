<?php

namespace App\Http\Requests\v1\SchoolHour;

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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'school_id' => 'required|integer|exists:schools,id',
            'title' => 'required|array',
            'title.kk' => 'required|string',
            'title.uz' => 'required|string',
            'title.ru' => 'required|string',
            'title.en' => 'required|string',
            'workday' => 'required|array',
            'workday.kk' => 'required|string',
            'workday.uz' => 'required|string',
            'workday.ru' => 'required|string',
            'workday.en' => 'required|string',
            'holiday' => 'required|array',
            'holiday.kk' => 'required|string',
            'holiday.uz' => 'required|string',
            'holiday.ru' => 'required|string',
            'holiday.en' => 'required|string',
        ];
    }
}
