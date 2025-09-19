<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'activities' => optional($this->clubs)->map(function ($club) {
                return [
                    'id' => $club->id,
                    'name' => $club->getTranslations('name'),
                    'text' => $club->getTranslations('text'),
                    'schedule' => $club->getTranslations('schedule'),
                    'photo' => [
                        'id' => $club->photo->id,
                        'name' => $club->photo->name,
                        'url' => asset('storage/' . $club->photo->path)
                    ]
                ];
            }),
        ];
    }
}
