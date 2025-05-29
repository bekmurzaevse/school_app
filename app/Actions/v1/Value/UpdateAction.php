<?php

namespace App\Actions\v1\Value;

use App\Dto\v1\Value\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Value\ValueResource;
use App\Models\Value;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $value = Value::with(['school', 'photo'])->findOrFail($id);
            $value->update([
                'name' => $dto->name,
                'text' => $dto->text,
                'photo_id' => $dto->photoId,
            ]);

            return static::toResponse(
                message: 'Value Updated',
                data: new ValueResource($value)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Value Not Found', 404);
        }
    }

}
