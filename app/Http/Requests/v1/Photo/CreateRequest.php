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
            'photos' => 'required|array|max:10',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'album_id' =>'nullable|integer|exists:albums,id',
            'description' =>'nullable|array',
            'description.kk' =>'nullable|string',
            'description.uz' =>'nullable|string',
            'description.ru' =>'nullable|string',
            'description.en' =>'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'photos.required' => "photos polya ma'jbu'riy!",
            'photos.array' => "photos array ko'rinisinde jiberiliwi kerek!",
            'photos.max' => 'photos da 10 maksimum 10 fayl jibere alasiz!',
            'photos.*.image' => "Ju'klengen fayllar image tipinda boliwi kerek!",
            'photos.*.max' => "fayl din' ko'lemi 2 MB dan aspawi kerek!",
            'album_id.exists' => 'album_id bazada tabilmadi!',
        ];
    }
}
