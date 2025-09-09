<?php

namespace App\Http\Resources\v1\Album;

use App\Http\Resources\v1\Attachment\AttachmentResource;
use App\Http\Resources\v1\School\SchoolResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = Storage::disk('public')->url('images/example.jpg');
        return [
            'id' => $this->id,
            'title' => $this->getTranslations('title'),
            'photos' => AttachmentResource::collection($this->photos),
            // 'school' => new SchoolResource($this->school),
            'description' => $this->getTranslations('description'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
