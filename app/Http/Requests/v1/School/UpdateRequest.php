<?php

namespace App\Http\Requests\v1\School;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'required|array',
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'history' => 'required|array',
            'history.kk' => 'required|string',
            'history.uz' => 'required|string',
            'history.ru' => 'required|string',
            'history.en' => 'required|string',
            'phone' => [
                'required',
                'string',
                Rule::unique('schools', 'phone')->ignore($this->route('id')),
            ],
            'location' => 'required|string',
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.kk.required' => "KK name polya ma'jbu'riy",
    //         'name.uz.required' => "UZ name polya ma'jbu'riy",
    //         'name.ru.required' => "RU name polya ma'jbu'riy",
    //         'name.en.required' => "EN name polya ma'jbu'riy",
    //         'history.kk.required' => "KK history polya ma'jbu'riy",
    //         'history.uz.required' => "UZ history polya ma'jbu'riy",
    //         'history.ru.required' => "RU history polya ma'jbu'riy",
    //         'history.en.required' => "EN history polya ma'jbu'riy",
    //         'description.kk.required' => "KK description history polya ma'jbu'riy",
    //         'description.uz.required' => "UZ description history polya ma'jbu'riy",
    //         'description.ru.required' => "RU description history polya ma'jbu'riy",
    //         'description.en.required' => "EN description history polya ma'jbu'riy",
    //     ];
    // }
}
