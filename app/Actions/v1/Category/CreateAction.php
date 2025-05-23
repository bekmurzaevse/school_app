<?php

namespace App\Actions\v1\Category;

use App\Dto\v1\Category\CreateDto;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Category\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'description' => $dto->description,
        ];

        Category::create($data);

        return static::toResponse(
            message: "Kategoriya jaratildi!"
        );
    }
}