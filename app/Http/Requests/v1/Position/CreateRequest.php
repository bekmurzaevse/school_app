<?php

namespace App\Http\Requests\v1\Position;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // 'name.kk' => ['required', 'string', Rule::unique('positions', 'name->kk')],
            'name.kk' => 'required|string|unique:positions,name->kk',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id',
            'description' => 'nullable|array',
            'description.kk' => 'nullable|string',
            'description.uz' => 'nullable|string',
            'description.ru' => 'nullable|string',
            'description.en' => 'nullable|string',
        ];
    }

    // TODO xabarlardi toliq jaziw
    public function messages(): array
    {
        return [
            'name.kk.unique' => "Bunday name.kk bazada bar!",
            'name.kk.required' => "KK name polya ma'jbu'riy",
            // 'name.uz.required' => "UZ name polya ma'jbu'riy",
            // 'name.ru.required' => "RU name polya ma'jbu'riy",
            // 'name.en.required' => "EN name polya ma'jbu'riy",
            // 'history.kk.required' => "KK history polya ma'jbu'riy",
            // 'history.uz.required' => "UZ history polya ma'jbu'riy",
            // 'history.ru.required' => "RU history polya ma'jbu'riy",
            // 'history.en.required' => "EN history polya ma'jbu'riy",
            // 'description.kk.required' => "KK description history polya ma'jbu'riy",
            // 'description.uz.required' => "UZ description history polya ma'jbu'riy",
            // 'description.ru.required' => "RU description history polya ma'jbu'riy",
            // 'description.en.required' => "EN description history polya ma'jbu'riy",
        ];
    }
}
