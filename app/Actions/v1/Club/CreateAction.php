<?php

namespace App\Actions\v1\Club;

use App\Dto\v1\Club\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Club;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Club\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'text' => $dto->text,
            'schedule' => $dto->schedule,
            'school_id' => School::first()->id,
        ];

        $club = Club::create($data);
        $path = FileUploadHelper::file($dto->photo, 'photos');

        $club->photo()->create([
            'name' => $dto->photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $dto->photo->getSize(),
        ]);

        return static::toResponse(
            message: 'Club created'
        );
    }
}
