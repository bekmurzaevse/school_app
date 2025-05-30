<?php

namespace App\Http\Requests\v1\Rule;

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
            'text' => 'required|array',
            'text.kk' => 'required|string',
            'text.uz' => 'required|string',
            'text.ru' => 'required|string',
            'text.en' => 'required|string',
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
            'text.required' => 'text atları ma\'jbu\'riy.',
            'text.kk.required' => 'Qaraqalpaqsha tilinde text atı ma\'jbu\'riy.',
            'text.uz.required' => 'O\'zbek tilinde text atı ma\'jbu\'riy.',
            'text.ru.required' => 'Rus tilinde text atı ma\'jbu\'riy.',
            'text.en.required' => 'Inglis tilinde text atı ma\'jbu\'riy.',
        ];
    }
}
