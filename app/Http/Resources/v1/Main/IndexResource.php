<?php

namespace App\Http\Resources\v1\Main;

use App\Http\Resources\v1\Attachment\AttachmentResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $allEmployees = $this->positions->flatMap(function($position) {
            return $position->employees;
        });
        // $lastNews = $this->users->flatMap(function($user) {
        //     return $user->news;
        // });

        $lastNews = News::latest()->take(3)->get();

        return [
            // 'last_news' => $this->users->flatMap(fn($user) => $user->news),
            'last_news' => $lastNews->map(function ($news) {
                return [
                    'id' => $news->id,
                    'title' => $news->getTranslations('title'),
                    'short_content' => $news->getTranslations('short_content'),
                    'content' => $news->getTranslations('content'),
                    'cover_image' => new AttachmentResource($news->coverImage),
                    'created_at' => $news->created_at->format('Y-m-d'),
                ];
            }),
            'teachers' => TeacherResource::collection($allEmployees),
            'description' => $this->getTranslations('description'),
            'informations' => $this->informations->map(function ($info){
                return [
                    'id' => $info->id,
                    'title' => $info->getTranslations('title'),
                    'count' => $info->count,
                    'description' => $info->getTranslations('description'),
                ];
            }),
            'albums' => $this->albums->map(function ($album) {
                return [
                    'id' => $album->id,
                    'title' => $album->getTranslations('title'),
                    'description' => $this->getTranslations('description'),
                    'photos' => AttachmentResource::collection($album->photos),
                ];
            }),
        ];
    }
}
