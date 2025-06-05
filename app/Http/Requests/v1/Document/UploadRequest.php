<?php

namespace App\Http\Requests\v1\Document;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf,docx'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Document atları ma\'jbu\'riy.',
            'description.required' => 'Táriyplew ma\'jbu\'riy..',
            'file.required' => 'Fayl ma\'jbu\'riy.',
            'file.file' => 'Fayl bolıwı kerek.',
            'file.mimes' => 'Fayl formati pdf, docx bolıwı kerek.',
        ];
    }
}