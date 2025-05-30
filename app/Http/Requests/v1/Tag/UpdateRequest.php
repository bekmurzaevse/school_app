<?php

namespace App\Http\Requests\v1\Tag;

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
            'name' => 'required|array',
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
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
            'title.required' => 'title atları ma\'jbu\'riy.',
            'title.kk.required' => 'Qaraqalpaqsha tilinde title atı ma\'jbu\'riy.',
            'title.uz.required' => 'O\'zbek tilinde title atı ma\'jbu\'riy.',
            'title.ru.required' => 'Rus tilinde title atı ma\'jbu\'riy.',
            'title.en.required' => 'Inglis tilinde title atı ma\'jbu\'riy.',
            'description.required' => 'description atları ma\'jbu\'riy.',
            'description.kk.required' => 'Qaraqalpaqsha tilinde description atı ma\'jbu\'riy.',
            'description.uz.required' => 'O\'zbek tilinde description atı ma\'jbu\'riy.',
            'description.ru.required' => 'Rus tilinde description atı ma\'jbu\'riy.',
            'description.en.required' => 'Inglis tilinde description atı ma\'jbu\'riy.',
        ];
    }
}