<?php

namespace App\Actions\v1\Vacancy;

use App\Dto\v1\Vacancy\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Vacancy\VacancyResource;
use App\Models\Vacancy;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Vacancy\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $vacancy = Vacancy::with('school')->findOrFail($id);
            $vacancy->update([
                'title' => $dto->title,
                'content' => $dto->content,
                'salary' => $dto->salary,
                'active' => $dto->active ?? true
            ]);

            return static::toResponse(
                message: "Vacancy updated!",
                data: new VacancyResource($vacancy)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Vacancy not found!", 404);
        }
    }
}
