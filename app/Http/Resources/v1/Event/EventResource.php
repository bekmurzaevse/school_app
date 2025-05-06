<?php

namespace App\Http\Resources\v1\Event;

use App\Http\Resources\v1\File\FileResource;
use App\Http\Resources\v1\School\SchoolResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    /**
     * Summary of toArray
     * @param mixed $request
     * @return array{created_at: mixed, description: mixed, files: \Illuminate\Http\Resources\Json\AnonymousResourceCollection, id: mixed, location: mixed, name: mixed, next_event: mixed|\Illuminate\Http\Resources\MissingValue, previous_event: mixed|\Illuminate\Http\Resources\MissingValue, school: SchoolResource, school_id: mixed, start_time: mixed, updated_at: mixed}
     */
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
            'previous_event' => $this->when(isset($this->previous), function () {
                return [
                    'id' => $this->previous->id,
                    'name' => $this->previous->getTranslation('name', app()->getLocale()),
                ];
            }),
            'next_event' => $this->when(isset($this->next), function () {
                return [
                    'id' => $this->next->id,
                    'name' => $this->next->getTranslation('name', app()->getLocale()),
                ];
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
