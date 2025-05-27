<?php

namespace App\Http\Requests\v1\Information;

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
            'count' => 'required|integer',
            'title' => 'required|array',
            'title.kk' => 'required|string|unique:informations,title->kk',
            'title.uz' => 'required|string|unique:informations,title->uz',
            'title.ru' => 'required|string|unique:informations,title->ru',
            'title.en' => 'required|string|unique:informations,title->en',
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
            'school_id' => 'required|integer|exists:schools,id',
        ];
    }

    public function messages(): array
    {
        return [
            'count.required' => "count polya ma'jbu'riy",
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
