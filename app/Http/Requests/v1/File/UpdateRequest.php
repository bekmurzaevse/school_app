<?php

namespace App\Http\Requests\v1\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Summary of rules
     * @return array{description: string, description.en: string, description.kk: string, description.ru: string, description.uz: string, event_id: string, name: string, name.en: string, name.kk: string, name.ru: string, name.uz: string, path: string}
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
        ];
    }
}