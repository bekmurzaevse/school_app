<?php

namespace App\Actions\v1\News;

use App\Dto\v1\News\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\News\NewsResource;
use App\Models\News;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\News\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $news = News::with(['coverImage', 'author'])->findOrFail($id);

            $news->update([
                'title' => $dto->title,
                'short_content' => $dto->shortContent,
                'content' => $dto->content,
                'author_id' => auth()->user()->id,
                'cover_image' => $dto->coverImage,
            ]);

            if ($dto->tags) {
                $news->tags()->sync(
                    $dto->tags
                );
            }

            if (Storage::disk('public')->exists($news->coverImage->path)) {
                Storage::disk('public')->delete($news->coverImage->path);
            }

            $path = FileUploadHelper::file($dto->coverImage, 'photos');

            $news->coverImage()->update([
                'name' => $dto->coverImage->getClientOriginalName(),
                'path' => $path,
                'type' => "photo",
                'size' => $dto->coverImage->getSize(),
            ]);

            return static::toResponse(
                message: 'News Updated',
                data: new NewsResource($news)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('News Not Found', 404);
        }
    }
}
