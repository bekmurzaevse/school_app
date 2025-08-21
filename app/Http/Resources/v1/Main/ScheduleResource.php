<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'schedules' => optional($this->schedules)->map(function ($schedule) {
                return [
                    'id' => $schedule->id,
                    'name' => pathinfo($schedule->name, PATHINFO_FILENAME),
                    'download_url' => Storage::disk('public')->exists($schedule->path) ? url('/api/v1/schedules/download/' . $schedule->id) : null,
                ];
            }),
        ];
    }
}
