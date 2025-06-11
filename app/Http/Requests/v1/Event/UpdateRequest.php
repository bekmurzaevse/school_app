<?php

namespace App\Http\Requests\v1\Event;

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
            'name.kk' => 'required|string|unique:events,name->kk,',
            'name.uz' => 'required|string|unique:events,name->uz,',
            'name.ru' => 'required|string|unique:events,name->ru,',
            'name.en' => 'required|string|unique:events,name->en,',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'location' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "name polya ma'jbu'riy.",
            'name.array' => "name maydani array boliwi kerek.",
            'name.kk.required' => "Kk ati ma'jbu'riy.",
            'name.uz.required' => "Uzb ati ma'jbu'riy.",
            'name.ru.required' => "Ru ati ma'jbu'riy.",
            'name.en.required' => "En ati ma'jbu'riy.",
            'description.required' => "description maydani ma'jbu'riy.",
            'description.array' => "description maydani array boliwi kerek.",
            'description.kk.required' => "Kk description ma'jbu'riy.",
            'description.uz.required' => "Uzb description ma'jbu'riy.",
            'description.ru.required' => "Ru description ma'jbu'riy.",
            'description.en.required' => "En description ma'jbu'riy.",
            'start_time.required' => "Baslaniw waqti ma'jbu'riy.",
            'start_time.date_format' => "start_time formati qa'te. Duris format: Y-m-d H:i:s",
            'location.required' => "Ma'nzil (location) ma'jbu'riy.",
            'location.string' => "Ma'nzil (location) string boliwi kerek.",
        ];
    }
}
