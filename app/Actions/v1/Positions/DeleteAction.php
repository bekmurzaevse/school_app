<?php 

namespace App\Actions\v1\Positions;

use App\Exceptions\ApiResponseException;
use App\Models\Position;
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
    public function __invoke(int $id) : JsonResponse
    {
        try {
            $position = Position::findOrFail($id);
            $position->delete();

            return static::toResponse(
                message: "$id - id li lawazim o'shirildi!",
            );   
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li mektep bazada tabilmadi!", 404);
        }
    }
}