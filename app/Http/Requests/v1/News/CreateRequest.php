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
        return auth()->check();
    }

    /**
     * Summary of prepareForValidation
     * @return void
     */
    public function prepareForValidation(): void
    {
        $this->tags = explode(",", $this->tags);
        $this->tags = array_map('intval', $this->tags);

        if ($this->has('tags')) {
            $this->merge([
                'tags' => collect($this->tags)->map(fn($tag) => (int) $tag)->all(),
            ]);
        }

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
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'required|integer|exists:tags,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'title atları ma\'jbu\'riy.',
            'title.kk.required' => 'Qaraqalpaqsha tilinde title atı ma\'jbu\'riy.',
            'title.uz.required' => 'O\'zbek tilinde title atı ma\'jbu\'riy.',
            'title.ru.required' => 'Rus tilinde title atı ma\'jbu\'riy.',
            'title.en.required' => 'Inglis tilinde title atı ma\'jbu\'riy.',
            'short_content.required' => 'short_content atları ma\'jbu\'riy.',
            'short_content.kk.required' => 'Qaraqalpaqsha tilinde short_content atı ma\'jbu\'riy.',
            'short_content.uz.required' => 'O\'zbek tilinde short_content atı ma\'jbu\'riy.',
            'short_content.ru.required' => 'Rus tilinde short_content atı ma\'jbu\'riy.',
            'short_content.en.required' => 'Inglis tilinde short_content atı ma\'jbu\'riy.',
            'content.required' => 'content atları ma\'jbu\'riy.',
            'content.kk.required' => 'Qaraqalpaqsha tilinde content atı ma\'jbu\'riy.',
            'content.uz.required' => 'O\'zbek tilinde content atı ma\'jbu\'riy.',
            'content.ru.required' => 'Rus tilinde content atı ma\'jbu\'riy.',
            'content.en.required' => 'Inglis tilinde short_content atı ma\'jbu\'riy.',
            'cover_image.image' => 'foto tipindegi mag\'liwmat beriliwi kerek',
            'cover_image.max' => 'foto nin\' razmeri 2 mb tan aspawi kerek',
            'tags.array' => 'Tags ma\'jbu\'riy bolıwı kerek.',
            'tags.*.required' => 'Tag ID ma\'jbu\'riy.',
            'tags.*.integer' => 'Tag ID san bolıwı kerek.',
            'tags.*.exists' => 'Tag ID tags kestesinde bar bolıwı kerek.',
        ];
    }
}
