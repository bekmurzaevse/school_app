<?php

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Schedule\CreateDto $dto
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $path = FileUploadHelper::file($dto->file, 'schedule');

        $school = School::first();

        $school->schedules()->create([
            'name' => $dto->file->getClientOriginalName(),
            'path' => $path,
            'type' => 'schedule',
            'size' => $dto->file->getSize(),
            'description' => $dto->description,
        ]);

        return static::toResponse(
            message: 'Schedule created'
        );
    }
}
