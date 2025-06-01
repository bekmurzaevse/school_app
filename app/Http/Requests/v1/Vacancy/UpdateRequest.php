<?php

namespace App\Http\Requests\v1\Vacancy;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|array',
            'title.kk' => 'required|string',
            'title.uz' => 'required|string',
            'title.ru' => 'required|string',
            'title.en' => 'required|string',
            'content' => 'required|array',
            'content.kk' => 'required|string',
            'content.uz' => 'required|string',
            'content.ru' => 'required|string',
            'content.en' => 'required|string',
            'salary' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'salary.required' => "salary polya ma'jbu'riy",
            'salary.integer' => "salary polya san boliwi kerek!",
            'title.required' => "title polya ma'jbu'riy",
            'title.kk.required' => "KK title polya ma'jbu'riy",
            'title.uz.required' => "UZ title polya ma'jbu'riy",
            'title.ru.required' => "RU title polya ma'jbu'riy",
            'title.en.required' => "EN title polya ma'jbu'riy",
            'content.required' => "content polya ma'jbu'riy",
            'content.kk.required' => "KK content polya ma'jbu'riy",
            'content.uz.required' => "UZ content polya ma'jbu'riy",
            'content.ru.required' => "RU content polya ma'jbu'riy",
            'content.en.required' => "EN title polya ma'jbu'riy",
        ];
    }
}
