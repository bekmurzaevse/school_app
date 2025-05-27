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
            'question' => 'required|array',
            'question.kk' => 'required|string|unique:faqs,question->kk',
            'question.uz' => 'required|string|unique:faqs,question->uz',
            'question.ru' => 'required|string|unique:faqs,question->ru',
            'question.en' => 'required|string|unique:faqs,question->en',
            'answer' => 'required|array',
            'answer.kk' => 'required|string|unique:faqs,answer->kk',
            'answer.uz' => 'required|string|unique:faqs,answer->uz',
            'answer.ru' => 'required|string|unique:faqs,answer->ru',
            'answer.en' => 'required|string|unique:faqs,answer->en',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => "question polya ma'jbu'riy",
            'question.kk.required' => "KK question polya ma'jbu'riy",
            'question.uz.required' => "UZ question polya ma'jbu'riy",
            'question.ru.required' => "RU question polya ma'jbu'riy",
            'question.en.required' => "EN question polya ma'jbu'riy",
            'question.kk.unique' => "Bunday question.kk bazada bar!",
            'question.uz.unique' => "Bunday question.uz bazada bar!",
            'question.ru.unique' => "Bunday question.ru bazada bar!",
            'question.en.unique' => "Bunday question.en bazada bar!",
            'answer.required' => "answer polya ma'jbu'riy",
            'answer.kk.required' => "KK answer polya ma'jbu'riy",
            'answer.uz.required' => "UZ answer polya ma'jbu'riy",
            'answer.ru.required' => "RU answer polya ma'jbu'riy",
            'answer.en.required' => "EN answer polya ma'jbu'riy",
            'answer.kk.unique' => "Bunday answer.kk bazada bar!",
            'answer.uz.unique' => "Bunday answer.uz bazada bar!",
            'answer.ru.unique' => "Bunday answer.ru bazada bar!",
            'answer.en.unique' => "Bunday answer.en bazada bar!",
        ];
    }
}
