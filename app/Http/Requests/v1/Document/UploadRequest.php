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
            'name' => 'required|array',
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
            'file' => 'required|file|mimes:pdf,docx'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Document atları ma\'jbu\'riy.',
            'name.kk.required' => 'Qaraqalpaqsha tilinde Document atı ma\'jbu\'riy.',
            'name.uz.required' => 'O\'zbek tilinde Document atı ma\'jbu\'riy.',
            'name.ru.required' => 'Rus tilinde Document atı ma\'jbu\'riy.',
            'name.en.required' => 'Inglis tilinde Document atı ma\'jbu\'riy.',
            'category_id.required' => 'Kategorya ID ma\'jbu\'riy.',
            'category_id.exists' => 'Kategorya ID categories kestesinde bar bolıwı kerek.',
            'category_id.integer' => 'Kategorya ID san bolıwı kerek.',
            'description.required' => 'Táriyplew ma\'jbu\'riy..',
            'description.kk.required' => 'Qaraqalpaqsha tilinde táriyplew ma\'jbu\'riy.',
            'description.uz.required' => 'O\'zbek tilinde táriyplew ma\'jbu\'riy.',
            'description.ru.required' => 'Rus tilinde táriyplew ma\'jbu\'riy.',
            'description.en.required' => 'Inglis tilinde táriyplew ma\'jbu\'riy.',
            'file.required' => 'Fayl ma\'jbu\'riy.',
            'file.file' => 'Fayl bolıwı kerek.',
            'file.mimes' => 'Fayl formati pdf, docx bolıwı kerek.',
        ];
    }
}