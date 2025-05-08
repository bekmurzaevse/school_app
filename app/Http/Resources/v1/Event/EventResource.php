<?php

namespace App\Http\Resources\v1\Event;

use App\Http\Resources\v1\File\FileResource;
use App\Http\Resources\v1\School\SchoolResource;
use App\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    /**
     * Summary of toArray
     * @param mixed $request
     * @return array{created_at: mixed, description: mixed, files: \Illuminate\Http\Resources\Json\AnonymousResourceCollection, id: mixed, location: mixed, name: mixed, next_event: array{id: mixed, name: mixed|null, previous_event: array{id: mixed, name: mixed}|null, school: SchoolResource, school_id: mixed, start_time: mixed, updated_at: mixed}}
     */
    public function toArray($request)
    {
        $locale = app()->getLocale();

        $previous = Event::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();

        $next = Event::where('id', '>', $this->id)
            ->orderBy('id', 'asc')
            ->first();

        return [
            'id' => $this->id,
            'name' => $this->name[$locale] ?? $this->name,
            'description' => $this->description[$locale] ?? $this->description,
            'location' => $this->location,
            'start_time' => $this->start_time,
            'school' => new SchoolResource($this->whenLoaded('school')),
            'files' => FileResource::collection($this->whenLoaded('files')),
            'previous_event' => $previous ? [
                'id' => $previous->id,
                'name' => $previous->name[$locale] ?? $previous->name,
            ] : null,
            'next_event' => $next ? [
                'id' => $next->id,
                'name' => $next->name[$locale] ?? $next->name,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
