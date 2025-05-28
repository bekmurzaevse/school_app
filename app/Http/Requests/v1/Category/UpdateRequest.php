<?php

namespace App\Http\Requests\v1\Category;

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
            'name.en' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.kk' => 'required|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.kk' => 'nullable|string',
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => "name polya ma'jbu'riy",
            'name.array' => "name maydani array boliwi kerek.",
            'name.en.required' => "En at ma'jbu'riy.",
            'name.uz.required' => "Uzb at ma'jbu'riy.",
            'name.ru.required' => "Ru at ma'jbu'riy.",
            'name.kk.required' => "Qq at ma'jbu'riy.",

            'description.array' => "description maydani array boliwi kerek.",
            'description.en.string' => "En description polya string boliwi kerek.",
            'description.uz.string' => "Uzb description polya string boliwi kerek.",
            'description.ru.string' => "Ru description polya string boliwi kerek.",
            'description.kk.string' => "Kk description polya string boliwi kerek.",
        ];
    }
}
