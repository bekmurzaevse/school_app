<?php

namespace App\Actions\v1\File;

use App\Dto\v1\File\CreateDto;
use App\Models\File;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'description' => $dto->description,
            'event_id' => $dto->eventId,
            'path' => $dto->path,
        ];

        $file = File::create($data);

        return static::toResponse(
            message: "File a'wmetli jaratildi!",
            data: $file
        );
    }
}