<?php

namespace App\Actions\v1\Photos;

use App\Dto\v1\Photos\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Photos\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $uploadedFiles = FileUploadHelper::files($dto->photos);

        array_map(function ($path) use ($dto){
            $data = [
                'title' => $dto->title,
                'path' => $path,
                'album_id' => $dto->albumId ?? null,
                'description' => $dto->description
            ];
            $photo = Photo::create($data);
        }, $uploadedFiles);

        return static::toResponse(
            message: "Photo jaratildi!",
        );
    }
}
