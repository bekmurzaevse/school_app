<?php

namespace App\Actions\v1\Rule;

use App\Dto\v1\Rule\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Rule\RuleResource;
use App\Models\Rule;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Rule\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $rule = Rule::with(['school'])->findOrFail($id);
            $rule->update([
                'title' => $dto->title,
                'text' => $dto->text,
            ]);

            return static::toResponse(
                message: 'Rule Updated',
                data: new RuleResource($rule)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Rule Not Found', 404);
        }
    }
}
