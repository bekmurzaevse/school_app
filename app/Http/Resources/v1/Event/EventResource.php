<?php

namespace App\Http\Resources\v1\Event;

use App\Http\Resources\v1\File\FileResource;
use App\Http\Resources\v1\School\SchoolResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name', app()->getLocale()),
            'description' => $this->getTranslation('description', app()->getLocale()),
            'location' => $this->location,
            'start_time' => $this->start_time,
            'school_id' => $this->school_id,
            'school' => new SchoolResource($this->whenLoaded('school')),
            'files' => FileResource::collection($this->whenLoaded('files')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}