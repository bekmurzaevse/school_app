<?php

namespace App\Http\Requests\v1\Target;

use Illuminate\Foundation\Http\FormRequest;

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
            'name.kk' => 'required|string|unique:targets,name->kk',
            'name.uz' => 'required|string|unique:targets,name->uz',
            'name.ru' => 'required|string|unique:targets,name->ru',
            'name.en' => 'required|string|unique:targets,name->en',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
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

            'description.required' => "description polya ma'jbu'riy",
            'description.kk.required' => "KK description polya ma'jbu'riy",
            'description.uz.required' => "UZ description polya ma'jbu'riy",
            'description.ru.required' => "RU description polya ma'jbu'riy",
            'description.en.required' => "EN description polya ma'jbu'riy",
        ];
    }
}