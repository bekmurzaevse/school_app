<?php

namespace App\Http\Requests\v1\Value;

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
            'text' => 'required|array',
            'text.kk' => 'required|string',
            'text.uz' => 'required|string',
            'text.ru' => 'required|string',
            'text.en' => 'required|string',
            'photo_id' => 'required|numeric|exists:photos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'name atları ma\'jbu\'riy.',
            'name.kk.required' => 'Qaraqalpaqsha tilinde name atı ma\'jbu\'riy.',
            'name.uz.required' => 'O\'zbek tilinde name atı ma\'jbu\'riy.',
            'name.ru.required' => 'Rus tilinde name atı ma\'jbu\'riy.',
            'name.en.required' => 'Inglis tilinde name atı ma\'jbu\'riy.',
            'text.required' => 'text atları ma\'jbu\'riy.',
            'text.kk.required' => 'Qaraqalpaqsha tilinde text atı ma\'jbu\'riy.',
            'text.uz.required' => 'O\'zbek tilinde text atı ma\'jbu\'riy.',
            'text.ru.required' => 'Rus tilinde text atı ma\'jbu\'riy.',
            'text.en.required' => 'Inglis tilinde text atı ma\'jbu\'riy.',
            'photo_id.required' => 'Foto ID ma\'jbu\'riy.',
            'photo_id.exists' => 'Foto ID photos kestesinde bar bolıwı kerek.',
            'photo_id.integer' => 'Foto ID san bolıwı kerek.',
        ];
    }
}
