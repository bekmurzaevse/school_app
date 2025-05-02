<?php

namespace App\Http\Requests\v1\Photo;

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


    public function rules(): array
    {
        return [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' =>'required|string',
            // 'path' =>'required|string|unique:photos,path',
            'album_id' =>'nullable|integer|exists:albums,id',
            'description' =>'nullable|array',
            'description.kk' =>'nullable|string',
            'description.uz' =>'nullable|string',
            'description.ru' =>'nullable|string',
            'description.en' =>'nullable|string',
        ];
    }

}
