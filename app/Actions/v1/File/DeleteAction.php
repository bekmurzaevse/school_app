<?php 

namespace App\Actions\v1\File;

use App\Exceptions\ApiResponseException;
use App\Models\File;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $file = File::findOrFail($id);
            $file->delete();

            return static::toResponse(
                message: "$id - id li fayl o'shirildi!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li fayl tabilmadi", 404);
        }
    }
}
