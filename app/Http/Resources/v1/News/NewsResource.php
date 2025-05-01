<?php

namespace App\Http\Resources\v1\News;

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
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'title' => $this->getTranslation('title', app()->getLocale()),
            'short_content' => $this->getTranslation('short_content', app()->getLocale()),
            'content' => $this->getTranslation('content', app()->getLocale()),
            'author' => $this->author,
            'cover_image' => $this->coverImage,
            'tags' => $this->tags
        ];
    }
}
