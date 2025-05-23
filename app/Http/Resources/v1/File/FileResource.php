<?php

namespace App\Http\Resources\v1\File;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $fileExists = Storage::disk('public')->exists($this->path);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $fileExists ? Storage::disk('public')->mimeType($this->path) : null,
            'size' => $fileExists ? round(Storage::disk('public')->size($this->path) / 1024, 2) . ' KB' : null,
            'download_url' => $fileExists ? url('/api/v1/files/download/' . $this->id) : null,
            'created_at' => $this->created_at,
        ];
    }
}