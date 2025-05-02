<?php

namespace App\Http\Requests\v1\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

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
     * Summary of rules
     * @return array{description: string, description.en: string, description.kk: string, description.ru: string, description.uz: string, location: string, name: string, name.en: string, name.kk: string, name.ru: string, name.uz: string, school_id: string, start_time: string}
     */
    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.kk' => 'required|string',
            'name.uz' => 'required|string',
            'name.ru' => 'required|string',
            'name.en' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id',
            'description' => 'required|array',
            'description.kk' => 'required|string',
            'description.uz' => 'required|string',
            'description.ru' => 'required|string',
            'description.en' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'location' => 'required|string',
        ];
    }

    public function startTime(): Carbon
    {
        return Carbon::parse($this->input('start_time'));
    }
}