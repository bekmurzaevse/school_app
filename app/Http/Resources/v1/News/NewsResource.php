<?php

namespace App\Http\Resources\v1\News;

use App\Http\Resources\v1\Photo\PhotoResource;
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
            'title' => $this->title,
            'short_content' => $this->short_content,
            'content' => $this->content,
            'author' => new UserResource($this->author),
            'cover_image' => $this->coverImage,
            'tags' => TagResource::collection($this->tags)
        ];
    }
}
