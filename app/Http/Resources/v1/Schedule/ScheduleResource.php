<?php

namespace App\Http\Resources\v1\Schedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ScheduleResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $fileExists = Storage::disk('public')->exists($this->path);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $fileExists ? Storage::disk('public')->mimeType($this->path) : null,
            'type' => $this->type,
            'size' => $fileExists ? round(Storage::disk('public')->size($this->path) / 1024, 2) . " KB" : null,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'download_url' => $fileExists ? url('/api/v1/schedules/download/' . $this->id) : null,
        ];
    }
}