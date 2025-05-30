<?php

namespace App\Http\Requests\v1\Club;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'schedule' => 'required|array',
            'schedule.kk' => 'required|string',
            'schedule.uz' => 'required|string',
            'schedule.ru' => 'required|string',
            'schedule.en' => 'required|string',
            'photo_id' => 'required|integer|exists:photos,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Club atları ma\'jbu\'riy.',
            'name.kk.required' => 'Qaraqalpaqsha tilinde Club atı ma\'jbu\'riy.',
            'name.uz.required' => 'O\'zbek tilinde Club atı ma\'jbu\'riy.',
            'name.ru.required' => 'Rus tilinde Club atı ma\'jbu\'riy.',
            'name.en.required' => 'Inglis tilinde Club atı ma\'jbu\'riy.',
            'text.required' => 'Tekst ma\'jbu\'riy..',
            'text.kk.required' => 'Qaraqalpaqsha tilinde tekst ma\'jbu\'riy.',
            'text.uz.required' => 'O\'zbek tilinde tekst ma\'jbu\'riy.',
            'text.ru.required' => 'Rus tilinde tekst ma\'jbu\'riy.',
            'text.en.required' => 'Inglis tilinde tekst ma\'jbu\'riy.',
            'schedule.required' => 'Grafik ma\'jbu\'riy.',
            'schedule.kk.required' => 'Qaraqalpaqsha tilinde Grafik ma\'jbu\'riy.',
            'schedule.uz.required' => 'O\'zbek tilinde Grafik ma\'jbu\'riy.',
            'schedule.ru.required' => 'Rus tilinde Grafik ma\'jbu\'riy.',
            'schedule.en.required' => 'Inglis tilinde Grafik ma\'jbu\'riy.',
            'photo_id.required' => 'Foto ID ma\'jbu\'riy.',
            'photo_id.exists' => 'Foto ID photos kestesinde bar bolıwı kerek.',
            'photo_id.integer' => 'Foto ID san bolıwı kerek.',
        ];
    }
}
