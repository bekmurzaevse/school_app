<?php

namespace App\Http\Requests\v1\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
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
            'event_id' => 'nullable|exists:events,id',
            'path' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,docx,jpg,png|max:20480',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "name polya ma'jbu'riy",
            'name.array' => "name polya massiv boliw kerek",
            'name.en.required' => "EN name polya ma'jbu'riy",
            'name.uz.required' => "UZ name polya ma'jbu'riy",
            'name.ru.required' => "RU name polya ma'jbu'riy",
            'name.kk.required' => "KK name polya ma'jbu'riy",
            'description.array' => "description polya massiv boliw kerek",
            'description.en.string' => "EN description string boliw kerek",
            'description.uz.string' => "UZ description string boliw kerek",
            'description.ru.string' => "RU description string boliw kerek",
            'description.kk.string' => "KK description string boliw kerek",
            'event_id.exists' => "Bunday event_id bazada tabilmadi",
            'path.string' => "path polya string boliw kerek",
            'file.required' => "file polya ma'jbu'riy",
            'file.file' => "file boliw kerek",
            'file.mimes' => "file formati pdf, docx, jpg yaki png boliw kerek",
            'file.max' => "file 20 MB dan aspaytug'in boliw kerek",
        ];
    }

}
