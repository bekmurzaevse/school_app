<?php 

namespace App\Actions\V1\Schools;

use App\Exceptions\ApiResponseException;
use App\Models\School;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\ResponseTrait;
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
            $school = School::findOrFail($id);

            return static::toResponse(
                message: "School list",
                data: $school
            );   
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li mektep tabilmadi", 404);
        }
    }
}