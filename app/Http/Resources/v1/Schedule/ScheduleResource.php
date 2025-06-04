<?php

namespace App\Http\Resources\v1\Schedule;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ScheduleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $exists = $this->path && Storage::disk('public')->exists($this->path);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'size' => $exists ? round(Storage::disk('public')->size($this->path) / 1024, 2) . ' KB' : null,
            'mime_type' => $exists ? Storage::disk('public')->mimeType($this->path) : null,
            'download_url' => $exists ? url('/api/v1/schedules/download/' . $this->id) : null,
            'created_at' => $this->created_at,
        ];
    }
}