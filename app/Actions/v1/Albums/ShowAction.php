<?php 

namespace App\Actions\v1\Albums;

use App\Exceptions\ApiResponseException;
use App\Models\Album;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
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
        try{
            $album = Album::findOrFail($id);

            return static::toResponse(
                message: "$id - id li albom",
                data: $album
            );   
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li albom tabilmadi", 404);
        }
    }
}