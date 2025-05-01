<?php

namespace App\Actions\v1\News;

use App\Exceptions\ApiResponseException;
use App\Models\News;
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
            $school = News::findOrFail($id);
            $school->delete();

            return static::toResponse(
                message: 'News Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('News Not Found', 404);
        }
    }
}