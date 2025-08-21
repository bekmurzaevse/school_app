<?php

namespace App\Http\Resources\v1\Main;

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
                    'title' => $news->title,
                    'short_content' => $news->short_content,
                    'content' => $news->content,
                    'cover_image' => new PhotoResource($news->coverImage),
                ];
            }),
            'teachers' => TeacherResource::collection($allEmployees),
            'description' => $this->description,
            'info' => $this->info,
            'albums' => $this->albums->map(function ($album) {
                return [
                    'id' => $album->id,
                    'title' => $album->title,
                    'description' => $this->description,
                    // 'photos' => $album->photos,
                    'photos' => $album->photos->map(function ($photo){
                        return [
                            'id' => $photo->id,
                            'name' => $photo->name,
                            'path' => $photo->path,
                            'size' => $photo->size,
                            'description' => $photo->description,
                        ];
                    }),
                ];
            }),
        ];
    }
}
