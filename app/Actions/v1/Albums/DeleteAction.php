<?php 

namespace App\Actions\v1\Albums;

use App\Exceptions\ApiResponseException;
use App\Models\Album;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;
    
    public function __invoke(int $id): JsonResponse
    {
        try {
            $album = Album::findOrFail($id);
            $album->delete();

            return static::toResponse(
                message: "$id - id li albom o'shirildi!",
            );   
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li albom bazada tabilmadi!", 404);
        }
    }
}