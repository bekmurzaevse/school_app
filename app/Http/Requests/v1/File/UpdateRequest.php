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
            'file' => 'required|file|mimes:pdf,docx,jpg,png|max:20480', 
        ];
    }
}