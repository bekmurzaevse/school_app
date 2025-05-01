<?php

namespace App\Http\Requests\v1\Employee;

use Carbon\Carbon;
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
            'full_name' => 'required|array',
            'full_name.kk' => 'required|string',
            'full_name.uz' => 'required|string',
            'full_name.ru' => 'required|string',
            'full_name.en' => 'required|string',
            'phone' => 'required|string',
            'photo_id' => 'required|numeric|exists:photos,id',
            'email' => 'required|email',
            'position_id' => 'required|numeric|exists:positions,id',
            'birth_date' => 'required|date|before:today'
        ];
    }

    public function birthDate(): Carbon
    {
        return Carbon::parse($this->input('birth_date'));
    }
}