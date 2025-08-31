<?php

namespace App\Http\Resources\v1\News;

use App\Http\Resources\v1\Tag\TagResource;
use App\Http\Resources\v1\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'title' => $this->getTranslations('title'),
            'short_content' => $this->getTranslations('short_content'),
            'content' => $this->getTranslations('content'),
            'author' => new UserResource($this->author),
            'cover_image' => $this->coverImage,
            'tags' => TagResource::collection($this->tags),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
