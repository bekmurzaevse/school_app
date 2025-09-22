<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name,
            'photo' => Storage::disk('public')->url($this->photo?->path),
            'position' => $this->position->name,
            // dd($this->users->flatMap(fn($user) => $user->news));
            // 'id' => $this->id, $allNews = $school->users->flatMap(fn($user) => $user->news);
            // 'last_news' => $this->users->flatMap(fn($user) => $user->news),
            // 'teachers' => [$allEmployees],
        ];
    }
}
