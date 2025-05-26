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
            'school_id' => 'required|numeric|exists:schools,id',
        ];
    }
}
