<?php

namespace App\Http\Requests\v1\History;

use Illuminate\Foundation\Http\FormRequest;

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
            'year' => 'required|integer',
            'text' => 'required|array',
            'text.kk' => 'required|string',
            'text.uz' => 'required|string',
            'text.ru' => 'required|string',
            'text.en' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id',
        ];
    }

    public function messages(): array
    {
        return [
            'year.required' => "year polya ma'jbu'riy",
            'year.integer' => "year polya pu'tin san boliw kerek",

            'text.required' => "text polya ma'jbu'riy",
            'text.kk.required' => "KK text polya ma'jbu'riy",
            'text.uz.required' => "UZ text polya ma'jbu'riy",
            'text.ru.required' => "RU text polya ma'jbu'riy",
            'text.en.required' => "EN text polya ma'jbu'riy",
            'text.kk.unique' => "Bunday text.kk bazada bar!",
            'text.uz.unique' => "Bunday text.uz bazada bar!",
            'text.ru.unique' => "Bunday text.ru bazada bar!",
            'text.en.unique' => "Bunday text.en bazada bar!",

            'school_id.required' => "school_id polya ma'jbu'riy",
            'school_id.exists' => "Bunday school_id bazada tabilmadi",
        ];
    }

}