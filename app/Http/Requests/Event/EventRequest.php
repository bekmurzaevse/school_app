<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.en' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'school_id' => 'required|exists:schools,id',
            'start_time' => 'required|date',
            'location' => 'required|string',
        ];
    }
}