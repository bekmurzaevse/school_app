<?php

namespace App\Http\Requests\v1\Photo;

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
            'photos' => 'required|array|max:10',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'album_id' =>'nullable|integer|exists:albums,id',
            'description' =>'required|array',
            'description.kk' =>'required|string',
            'description.uz' =>'nullable|string',
            'description.ru' =>'nullable|string',
            'description.en' =>'nullable|string',
        ];
    }
}
