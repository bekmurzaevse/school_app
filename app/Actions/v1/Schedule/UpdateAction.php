<?php

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Schedule\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {

            $school = School::first();
            $attachment = $school->schedules()->findOrFail($id);

            if ($attachment->type !== 'schedule') {
                throw new ApiResponseException('Tek schedule turindegi attachment janalaniwi mumkin', 403);
            }

            $updateData = [
                'file' => $dto->file,
                'description' => $dto->description,
            ];

            if ($dto->file) {
                if ($attachment->path && Storage::disk('public')->exists($attachment->path)) {
                    Storage::disk('public')->delete($attachment->path);
                }

                $originalFilename = $dto->file->getClientOriginalName();
                $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
                $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H-i-s') . '.' . $dto->file->extension();

                $savedPath = Storage::disk('public')->putFileAs('attachments', $dto->file, $fileName);

                $updateData['path'] = $savedPath;
                $updateData['size'] = $dto->file->getSize();
            }

            $attachment->update($updateData);

            return static::toResponse(
                message: 'Schedule awmetli janalandi',
                data: $attachment
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Schedule tabilmadi', 404);
        }
    }

}