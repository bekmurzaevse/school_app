<?php

namespace App\Actions\v1\News;

use App\Dto\v1\News\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\News;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\News\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'short_content' => $dto->shortContent,
            'content' => $dto->content,
            'author_id' => auth()->user()->id,
        ];

        $news = News::create($data);

        if($dto->tags){
            $news->tags()->attach(
                $dto->tags
            );
        }

        $path = FileUploadHelper::file($dto->coverImage, 'photos');

        $news->coverImage()->create([
            'name' => $dto->coverImage->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $dto->coverImage->getSize(),
        ]);

        return static::toResponse(
            message: 'News created'
        );
    }
}
