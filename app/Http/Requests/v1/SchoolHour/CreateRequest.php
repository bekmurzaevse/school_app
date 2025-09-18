<?php

namespace App\Http\Requests\v1\SchoolHour;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|array',
            'title.kk' => [
                'required',
                'string',
                Rule::unique('school_hours', 'title->kk')->whereNull('deleted_at'),
            ],
            'title.uz' => [
                'required',
                'string',
                Rule::unique('school_hours', 'title->uz')->whereNull('deleted_at'),
            ],
            'title.ru' => [
                'required',
                'string',
                Rule::unique('school_hours', 'title->ru')->whereNull('deleted_at'),
            ],
            'title.en' => [
                'required',
                'string',
                Rule::unique('school_hours', 'title->en')->whereNull('deleted_at'),
            ],
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

    public function messages(): array
    {
        return [
            'title.required' => "title polya ma'jbu'riy",
            'title.kk.required' => "KK title polya ma'jbu'riy",
            'title.uz.required' => "UZ title polya ma'jbu'riy",
            'title.ru.required' => "RU title polya ma'jbu'riy",
            'title.en.required' => "EN title polya ma'jbu'riy",
            'title.kk.unique' => "Bunday title.kk bazada bar!",
            'title.uz.unique' => "Bunday title.uz bazada bar!",
            'title.ru.unique' => "Bunday title.ru bazada bar!",
            'title.en.unique' => "Bunday title.en bazada bar!",
            'workday.required' => "workday polya ma'jbu'riy",
            'workday.kk.required' => "KK workday polya ma'jbu'riy",
            'workday.uz.required' => "UZ workday polya ma'jbu'riy",
            'workday.ru.required' => "RU workday polya ma'jbu'riy",
            'workday.en.required' => "EN workday polya ma'jbu'riy",
            'holiday.required' => "holiday polya ma'jbu'riy",
            'holiday.kk.required' => "KK holiday polya ma'jbu'riy",
            'holiday.uz.required' => "UZ holiday polya ma'jbu'riy",
            'holiday.ru.required' => "RU holiday polya ma'jbu'riy",
            'holiday.en.required' => "EN holiday polya ma'jbu'riy",
        ];
    }
}
