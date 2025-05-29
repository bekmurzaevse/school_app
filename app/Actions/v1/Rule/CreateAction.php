<?php

namespace App\Actions\v1\Rule;

use App\Dto\v1\Rule\CreateDto;
use App\Models\Rule;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'text' => $dto->text,
            'school_id' => School::first()->id,
        ];

        Rule::create($data);

        return static::toResponse(
            message: 'Rule created'
        );
    }
}
