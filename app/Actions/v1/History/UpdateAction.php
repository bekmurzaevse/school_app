<?php

namespace App\Actions\v1\History;

use App\Dto\v1\History\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\History\HistoryResource;
use App\Models\History;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\History\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            foreach (['kk', 'uz', 'ru', 'en'] as $lang) {
                $exists = History::whereRaw("text->>'$lang' = ?", [$dto->text[$lang]])
                    ->where('id', '<>', $id)
                    ->exists();

                if ($exists) {
                    throw new ApiResponseException("History with same {$lang} text already exists", 422);
                }
            }

            $history = History::with('school')->findOrFail($id);
            $history->update([
                'year' => $dto->year,
                'text' => $dto->text
            ]);

            return static::toResponse(
                message: "History updated!",
                data: new HistoryResource($history)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - History not found!", 404);
        }
    }
}