<?php

namespace App\Http\Requests\v1\Album;

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
            'title' => 'required|array',
            'title.kk' => 'required|string',
            'title.uz' => 'required|string',
            'title.ru' => 'required|string',
            'title.en' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id',
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
            'title.required' => "title polya ma'jbu'riy",
            'title.kk.required' => "KK title polya ma'jbu'riy",
            'title.uz.required' => "UZ title polya ma'jbu'riy",
            'title.ru.required' => "RU title polya ma'jbu'riy",
            'title.en.required' => "EN title polya ma'jbu'riy",
            'title.kk.unique' => "Bunday title.kk bazada bar!",
            'title.uz.unique' => "Bunday title.uz bazada bar!",
            'title.ru.unique' => "Bunday title.ru bazada bar!",
            'title.en.unique' => "Bunday title.en bazada bar!",
            'school_id.required' => "school_id polya ma'jbu'riy",
            'school_id.exists' => "Bunday school_id bazada tabilmadi",
        ];
    }
}
