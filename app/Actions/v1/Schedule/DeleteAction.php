<?php

namespace App\Actions\v1\Schedule;

use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
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
        try {
            $school = School::first();
            $attachment = $school->schedules()->findOrFail($id);

            if ($attachment->type !== 'schedule') {
                throw new ApiResponseException('Tek schedule tu\'rindegi attachmentlardi o\'shiriw mumkin', 403);
            }

            if ($attachment->path && Storage::disk('public')->exists($attachment->path)) {
                Storage::disk('public')->delete($attachment->path);
            }

            $attachment->delete();

            return static::toResponse(
                message: 'Schedule attachment a\'wmetli o\'shirildi',
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Schedule attachment tabilmadi', 404);
        }
    }
}