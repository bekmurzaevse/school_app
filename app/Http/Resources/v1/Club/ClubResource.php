<?php

namespace App\Http\Resources\v1\Club;

use App\Http\Resources\v1\Attachment\AttachmentResource;
use App\Http\Resources\v1\School\SchoolResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            // 'school' => new SchoolResource($this->school),
            'text' => $this->getTranslations('text'),
            'schedule' => $this->getTranslations('schedule'),
            'photo' => new AttachmentResource($this->photo),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
