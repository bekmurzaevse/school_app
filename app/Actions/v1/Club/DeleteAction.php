<?php

namespace App\Actions\v1\Club;

use App\Exceptions\ApiResponseException;
use App\Models\Club;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $club = Club::findOrFail($id);
            $club->photo()->delete();
            $club->delete();

            return static::toResponse(
                message: 'Club Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Club Not Found', 404);
        }
    }
}
