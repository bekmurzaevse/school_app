<?php

namespace App\Http\Requests\v1\Faq;

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
            'school_id' => 'required|integer|exists:schools,id',
            'question' => 'required|array',
            'question.kk' => 'required|string',
            'question.uz' => 'required|string',
            'question.ru' => 'required|string',
            'question.en' => 'required|string',
            'answer' => 'required|array',
            'answer.kk' => 'required|string',
            'answer.uz' => 'required|string',
            'answer.ru' => 'required|string',
            'answer.en' => 'required|string',
        ];
    }
}
