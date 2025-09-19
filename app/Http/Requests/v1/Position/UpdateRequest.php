<?php

namespace App\Http\Requests\v1\Position;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.kk' => [
                'required',
                'string',
                Rule::unique('positions', 'name->kk')->whereNull('deleted_at'),
            ],
            'name.uz' => [
                'required',
                'string',
                Rule::unique('positions', 'name->uz')->whereNull('deleted_at'),
            ],
            'name.ru' => [
                'required',
                'string',
                Rule::unique('positions', 'name->ru')->whereNull('deleted_at'),
            ],
            'name.en' => [
                'required',
                'string',
                Rule::unique('positions', 'name->en')->whereNull('deleted_at'),
            ],
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "name polya ma'jbu'riy",
            'name.kk.required' => "KK name polya ma'jbu'riy",
            'name.uz.required' => "UZ name polya ma'jbu'riy",
            'name.ru.required' => "RU name polya ma'jbu'riy",
            'name.en.required' => "EN name polya ma'jbu'riy",
            'name.kk.unique' => "Bunday name.kk bazada bar!",
            'name.uz.unique' => "Bunday name.uz bazada bar!",
            'name.ru.unique' => "Bunday name.ru bazada bar!",
            'name.en.unique' => "Bunday name.en bazada bar!",
        ];
    }
}
