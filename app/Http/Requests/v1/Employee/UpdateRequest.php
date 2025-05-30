<?php

namespace App\Http\Requests\v1\Employee;

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
            'phone' => [
                'required',
                'string',
                Rule::unique('employees', 'phone')->ignore($this->route('id'))
            ],
            'photo_id' => 'required|integer|exists:photos,id',
            'email' => 'required|email',
            'position_id' => 'required|integer|exists:positions,id',
            'birth_date' => 'required|date|before:today'
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Jumısshı atları ma\'jbu\'riy.',
            'full_name.kk.required' => 'Qaraqalpaqsha tilinde Jumısshı atı ma\'jbu\'riy.',
            'full_name.uz.required' => 'O\'zbek tilinde Jumısshı atı ma\'jbu\'riy.',
            'full_name.ru.required' => 'Rus tilinde Jumısshı atı ma\'jbu\'riy.',
            'full_name.en.required' => 'Inglis tilinde Jumısshı atı ma\'jbu\'riy.',
            'phone.required' => 'Telefon nomeri ma\'jbu\'riy.',
            'phone.string' => 'Telefon nomeri tekst bolıwı kerek.',
            'phone.unique' => 'Bu telefon nomeri jumısshılar kestesinde tákirarlanbas bolıwı kerek.',
            'photo_id.required' => 'Foto ID ma\'jbu\'riy.',
            'photo_id.exists' => 'Foto ID photos kestesinde bar bolıwı kerek.',
            'photo_id.integer' => 'Foto ID san bolıwı kerek.',
            'email.required' => 'Email ma\'jbu\'riy.',
            'email.email' => 'Email formatı qate.',
            'position_id.required' => 'Lauazım ID ma\'jbu\'riy.',
            'position_id.integer' => 'Lauazım ID san bolıwı kerek.',
            'position_id.exists' => 'Lauazım ID positions kestesinde bar bolıwı kerek.',
            'birth_date.required' => 'Túwılğan kún ma\'jbu\'riy.',
            'birth_date.date' => 'Túwılğan kún formatı qate.',
            'birth_date.before' => 'Túwılğan kún bügünnen alda bolıwı kerek.',
        ];
    }
}
