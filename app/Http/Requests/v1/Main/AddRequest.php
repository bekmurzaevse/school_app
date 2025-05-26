<?php

namespace App\Http\Requests\v1\Main;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'text' => 'required|string',
            'employee_id' => 'required|integer|exists:employees,id',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => "text polya ma'jbu'riy",
            'employee_id.required' => "employee_id polya ma'jbu'riy",
            'employee_id.exists' => "Bunday employee_id bazada tabilmadi",
        ];
    }
}
