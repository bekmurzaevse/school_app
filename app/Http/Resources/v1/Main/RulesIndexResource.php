<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RulesIndexResource extends JsonResource
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
            'rules' => $this->rules->map(function ($rule) {
                return [
                    'id' => $rule->id,
                    'title' => $rule->title,
                    'text' => $rule->text,
                ];
            }),
            'documents' => $this->documents->map(function ($document){
                        return [
                            'id' => $document->id,
                            'name' => $document->name,
                            'path' => $document->path,
                            'size' => $document->size,
                            'description' => $document->description,
                            'download_url' => url('/api/v1/documents/download/' . $this->id),
                        ];
                    }),
            'school_hours' => $this->schoolHours->map(function ($schoolHour) {
                return [
                    'id' => $schoolHour->id,
                    'title' => $schoolHour->title,
                    'workday' => $schoolHour->workday,
                    'holiday' => $schoolHour->holiday,
                ];
            }),
        ];
    }
}
