<?php

namespace App\Actions\v1\Albums;

use App\Dto\v1\Albums\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Album;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Albums\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'school_id' => School::first()->id,
            'description' => $dto->description,
        ];

        $album = Album::create($data);

        foreach ($dto->photos as $photo) {
            $path = FileUploadHelper::file($photo, 'photos');
            $album->photos()->create([
                'name' => $photo->getClientOriginalName(),
                'path' => $path,
                'type' => "photo",
                'size' => $photo->getSize(),
            ]);
        }

        return static::toResponse(
            message: "Albom jaratildi!"
        );
    }
}
