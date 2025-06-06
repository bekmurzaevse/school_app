<?php

namespace App\Actions\v1\Value;

use App\Dto\v1\Value\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\School;
use App\Models\Value;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Value\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'text' => $dto->text,
            'school_id' => School::first()->id,
        ];

        $value = Value::create($data);
        $path = FileUploadHelper::file($dto->photo, 'photos');

        $value->photo()->create([
            'name' => $dto->photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $dto->photo->getSize(),
        ]);

        return static::toResponse(
            message: 'Value created'
        );
    }
}
