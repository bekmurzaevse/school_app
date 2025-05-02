<?php

namespace App\Actions\v1\Photos;

use App\Dto\v1\Photos\CreateDto;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $file = $dto->photo;
        $originalFilename = $file->getClientOriginalName();
        $fileName = preg_replace('/\.[^.]+$/', '', $originalFilename);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = 'photos';
        $savedPath = Storage::disk('public')->putFileAs($path, $file, $fileName);

        $data = [
            'title' => $dto->title,
            'path' => $savedPath,
            'album_id' => $dto->albumId ?? null,
            'description' => $dto->description
        ];
        $photo = Photo::create($data);

        return static::toResponse(
            message: "Photo jaratildi!",
            data: $photo
        );
    }
}
