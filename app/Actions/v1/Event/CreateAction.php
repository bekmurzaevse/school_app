<?php

namespace App\Actions\v1\Event;

use App\Dto\v1\Event\CreateDto;
use App\Models\Event;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Event\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        Event::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'school_id' => School::first()->id,
            'start_time' => $dto->startTime,
            'location' => $dto->location,
        ]);

        return static::toResponse(
            message: "Ta'dbir a'wmetli jaratildi!"
        );
    }
}