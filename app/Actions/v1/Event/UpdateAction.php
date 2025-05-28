<?php

namespace App\Actions\v1\Event;

use App\Dto\v1\Event\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\Event;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Event\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);

            $event->update([
                'name' => $dto->name,
                'description' => $dto->description,
                'start_time' => $dto->startTime,
                'location' => $dto->location,
            ]);

            return static::toResponse(
                message: "Ta'dbir a'wmetli jan'alandi!",
                data: $event
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li ta'dbir tabilmadi!", 404);
        }
    }
}