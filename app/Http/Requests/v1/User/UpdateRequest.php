<?php

namespace App\Http\Requests\v1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'full_name' => 'required|array',
            'full_name.kk' => 'required|string',
            'full_name.uz' => 'required|string',
            'full_name.ru' => 'required|string',
            'full_name.en' => 'required|string',
            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($this->route('id')),
        ],
            'password' => 'required|string',
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
            'phone' => [
                'required',
                'string',
                Rule::unique('users', 'phone')->ignore($this->route('id')),
        ],
            'school_id' => 'required|integer|exists:schools,id',
            'birth_date' => 'required|date_format:Y-m-d|before:today',
        ];
    }
}
