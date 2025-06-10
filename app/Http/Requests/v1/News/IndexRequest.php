<?php

namespace App\Http\Requests\v1\News;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'sort_by' => 'nullable|string|in:id,created_at,updated_at',
            'sort_order' => 'nullable|string|in:asc,desc',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'search' => 'nullable|string|min:3|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'page.integer' => 'Page integer bolıwı ma\'jbu\'riy.',
            'per_page.integer' => 'Per page integer bolıwı ma\'jbu\'riy.',
            'sort_by.string' => 'Sort by string bolıwı ma\'jbu\'riy.',
            'sort_by.in' => 'Sort by ID, created_at yamasa updated_at bolıwı ma\'jbu\'riy.',
            'sort_order.string' => 'Sort order string bolıwı ma\'jbu\'riy.',
            'from_date.date' => 'From date sa\'ne bolıwı ma\'jbu\'riy.',
            'to_date.date' => 'To date sa\'ne bolıwı ma\'jbu\'riy..',
            'to_date.after_or_equal' => 'To date - from date-tan u\'lken yamasa ten\' bolıwı ma\'jbu\'riy.',
            'tags.array' => 'Tags array bolıwı ma\'jbu\'riy.',
            'tags.*.integer' => 'Ha\'r bir tag ID integer bolıwı ma\'jbu\'riy.',
            'tags.*.exists' => 'Ha\'r bir tag ID tags kestesinde bar bolıwı ma\'jbu\'riy.',
            'search.string' => 'Search string bolıwı ma\'jbu\'riy.',
            'search.min' => 'Search 3 belgiden ko\'p bolıwı ma\'jbu\'riy.',
            'search.max' => 'Search 255 belgiden az bolıwı ma\'jbu\'riy.',
        ];
    }
}
