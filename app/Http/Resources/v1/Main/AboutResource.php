<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'about' => [
                'history' => $this->getTranslations('history'),
                'description' => $this->getTranslations('description'),
            ],
            'missions' => optional($this->targets)->map(function ($target) {
                return [
                    'id' => $target->id,
                    'name' => $target->getTranslations('name'),
                    'description' => $target->getTranslations('description'),
                ];
            }),
            'histories' => optional($this->histories)->map(function ($history) {
                return [
                    'id' => $history->id,
                    'year' => $history->year,
                    'text' => $history->getTranslations('text'),
                ];
            }),
            'values' => optional($this->values)->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->getTranslations('name'),
                    'text' => $value->getTranslations('text'),
                    'photo' => $value->photo ? [
                        'id' => $value->photo->id,
                        'name' => $value->photo->name,
                        'path' => $value->photo ? url('storage/' . $value->photo->path) : null,
                        'created_at' => $value->photo->created_at,
                        'updated_at' => $value->photo->updated_at,
                    ] : null,
                ];
            })
        ];
    }
}
