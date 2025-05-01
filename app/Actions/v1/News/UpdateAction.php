<?php

namespace App\Actions\v1\News;

use App\Dto\v1\News\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\News\NewsResource;
use App\Models\News;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto)
    {
        try {
            $news = News::findOrFail($id);
          
            $news->update([
                'title' => $dto->title,
                'short_content' => $dto->shortContent,
                'content' => $dto->content,
                'author_id' => $dto->authorId,
                'cover_image' => $dto->coverImage,
            ]);
            
            if($dto->tags){
                $news->tags()->sync(
                    $dto->tags
                );
            }

            return static::toResponse(
                message: 'News Updated',
                data: new NewsResource($news)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('News Not Found', 404);
        }
    }

}
