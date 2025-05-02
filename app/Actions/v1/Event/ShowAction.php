<?php

namespace App\Actions\v1\Event;

use App\Exceptions\ApiResponseException;
use App\Models\Event;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);

            return static::toResponse(
                message: "$id - id li ta'dbir",
                data: $event
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li ta'dbir tabilmadi", 404);
        }
    }
}