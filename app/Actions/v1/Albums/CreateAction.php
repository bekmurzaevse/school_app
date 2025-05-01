<?php 

namespace App\Actions\v1\Albums;

use App\Dto\v1\Albums\CreateDto;
use App\Models\Album;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'school_id' => $dto->schoolId,
            'description' => $dto->description,
        ];

        Album::create($data);

        return static::toResponse(
            message: "Albom jaratildi!"
        );
    }
}