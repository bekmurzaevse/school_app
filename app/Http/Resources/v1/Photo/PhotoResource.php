<?php

namespace App\Http\Resources\v1\Photo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'title' => $this->title,
            'path' => $this->path,
            'album' => $this->album,
            'description' => $this->description,
        ];
    }
}
