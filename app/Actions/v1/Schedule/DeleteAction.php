<?php

namespace App\Actions\v1\Schedule;

use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        $school = School::first();
        $attachment = $school->schedules()->find($id);

        if (!$attachment) {
            throw new ApiResponseException('Attachment topilmadi', 404);
        }

        if ($attachment->type !== 'schedule') {
            throw new ApiResponseException('Tek schedule turindegi attachmentlardi oshiriw mumkin', 403);
        }

        if ($attachment->path && Storage::disk('public')->exists($attachment->path)) {
            Storage::disk('public')->delete($attachment->path);
        }

        $attachment->delete();

        return static::toResponse(
            message: 'Schedule attachment awmetli oshirildi',
        );
    }
}