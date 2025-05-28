<?php

namespace App\Http\Requests\v1\File;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'event_id' => 'required|numeric|exists:events,id',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
            'file' => 'required|file|mimes:jpg,png,jpeg,pdf,zip,docx|max:5120' // 5MB limit
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