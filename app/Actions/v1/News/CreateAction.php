<?php

namespace App\Actions\v1\News;

use App\Dto\v1\News\CreateDto;
use App\Models\News;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'short_content' => $dto->shortContent,
            'content' => $dto->content,
            'author_id' => $dto->authorId,
            'cover_image' => $dto->coverImage,
        ];

        $news = News::create($data);

        if($dto->tags){
            $news->tags()->attach(
                $dto->tags
            );
        }

        return static::toResponse(
            message: 'News created'
        );
    }
}
