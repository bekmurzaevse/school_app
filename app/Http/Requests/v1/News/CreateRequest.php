<?php

namespace App\Http\Requests\v1\News;

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
            'title' => 'required|array',
            'title.kk' => 'required|string',
            'title.uz' => 'required|string',
            'title.ru' => 'required|string',
            'title.en' => 'required|string',
            'short_content' => 'required|array',
            'short_content.kk' => 'required|string',
            'short_content.uz' => 'required|string',
            'short_content.ru' => 'required|string',
            'short_content.en' => 'required|string',
            'content' => 'required|array',
            'content.kk' => 'required|string',
            'content.uz' => 'required|string',
            'content.ru' => 'required|string',
            'content.en' => 'required|string',
            'author_id' => 'required|numeric|exists:users,id',
            'cover_image' => 'required|numeric|exists:photos,id',
            'tags' => 'nullable|array',
            'tags.*' => 'required|numeric|exists:tags,id'
        ];
    }
}