<?php

namespace App\Http\Requests\v1\Position;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.kk' => 'required|string|unique:positions,name->kk',
            'name.uz' => 'required|string|unique:positions,name->uz',
            'name.ru' => 'required|string|unique:positions,name->ru',
            'name.en' => 'required|string|unique:positions,name->en',
            'school_id' => 'required|integer|exists:schools,id',
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "name polya ma'jbu'riy",
            'name.kk.required' => "KK name polya ma'jbu'riy",
            'name.uz.required' => "UZ name polya ma'jbu'riy",
            'name.ru.required' => "RU name polya ma'jbu'riy",
            'name.en.required' => "EN name polya ma'jbu'riy",
            'name.kk.unique' => "Bunday name.kk bazada bar!",
            'name.uz.unique' => "Bunday name.uz bazada bar!",
            'name.ru.unique' => "Bunday name.ru bazada bar!",
            'name.en.unique' => "Bunday name.en bazada bar!",
            'school_id.required' => "school_id polya ma'jbu'riy",
            'school_id.exists' => "Bunday school_id bazada tabilmadi",
        ];
    }

}
