<?php

namespace App\Http\Resources\v1\SchoolHour;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolHourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'title' => $this->title,
            'title' => $this->getTranslations('title'),
            'school' => $this->school,
            'workday' => $this->workday,
            'holiday' => $this->holiday,
        ];
    }
}
