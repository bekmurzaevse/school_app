<?php

namespace App\Http\Requests\v1\Category;

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
            'name.en' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.kk' => 'required|string',
            'description' => 'nullable|array',
            'description.en' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.kk' => 'nullable|string',
        ];
    }
}