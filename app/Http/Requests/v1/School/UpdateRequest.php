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

    public function messages(): array
    {
        return [
            'location.required' => "location polya ma'jbu'riy",
            'phone.required' => "phone polya ma'jbu'riy",
            'phone.unique' => "Bunday phone bazada bar!",
            'name.required' => "name polya ma'jbu'riy",
            'name.kk.required' => "KK name polya ma'jbu'riy",
            'name.uz.required' => "UZ name polya ma'jbu'riy",
            'name.ru.required' => "RU name polya ma'jbu'riy",
            'name.en.required' => "EN name polya ma'jbu'riy",
            'name.kk.unique' => "Bunday name.kk bazada bar!",
            'name.uz.unique' => "Bunday name.uz bazada bar!",
            'name.ru.unique' => "Bunday name.ru bazada bar!",
            'name.en.unique' => "Bunday name.en bazada bar!",
            'history.required' => "history polya ma'jbu'riy",
            'history.kk.required' => "KK history polya ma'jbu'riy",
            'history.uz.required' => "UZ history polya ma'jbu'riy",
            'history.ru.required' => "RU history polya ma'jbu'riy",
            'history.en.required' => "EN history polya ma'jbu'riy",
        ];
    }
}
