<?php 

namespace App\Actions\v1\Positions;

use App\Exceptions\ApiResponseException;
use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try{
            $position = Position::findOrFail($id);

            return static::toResponse(
                message: "$id - id li lawazim",
                data: $position
            );   
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li mektep tabilmadi", 404);
        }
    }
}