<?php

namespace App\Http\Resources\v1\Document;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentResource extends JsonResource
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
            'type' => $fileExists ? Storage::disk('public')->mimeType($this->path) : null,
            'size' => $fileExists ? round(Storage::disk('public')->size($this->path) / 1024, 2) . " KB" : null,
            'created_at' => $this->created_at,
            'download_url' => $fileExists ? url('/api/v1/documents/download/' . $this->id) : null,
        ];
    }
}
