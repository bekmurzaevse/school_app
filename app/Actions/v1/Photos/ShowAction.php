<?php

namespace App\Actions\v1\Photos;

use App\Exceptions\ApiResponseException;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
{
    use ResponseTrait;

    
    public function __invoke(int $id): JsonResponse
    {
        try{
            $photo = Photo::findOrFail($id);

            return static::toResponse(
                message: "$id - id li photo",
                data: $photo
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li photo tabilmadi", 404);
        }
    }
}
