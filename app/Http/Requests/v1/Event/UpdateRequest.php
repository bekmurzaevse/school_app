<?php

namespace App\Http\Requests\v1\Event;

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
            'name' => 'required|array',
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'location' => 'required|string',
        ];
    }
}