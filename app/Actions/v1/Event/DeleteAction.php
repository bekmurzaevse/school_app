<?php

namespace App\Actions\v1\Event;

use App\Exceptions\ApiResponseException;
use App\Models\Event;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();

            return static::toResponse(
                message: "$id - id li tadbir o‘shirildi!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li tadbir tabilmadi!", 404);
        }
    }
}