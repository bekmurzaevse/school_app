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
                'description' => $dto->description,
            ];

            $formats = [
                'pdf' => $dto->pdf,
                'xls' => $dto->xls,
                'csv' => $dto->csv,
            ];

            foreach ($formats as $ext => $file) {
                if ($file) {
                    $oldPath = 'schedule/' . pathinfo($attachment->name, PATHINFO_FILENAME) . '.' . $ext;
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }

                    $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileName = $baseName . '_' . Str::random(10) . '.' . $ext;
                    $filePath = 'schedule/' . $fileName;

                    Storage::disk('public')->putFileAs('schedule', $file, $fileName);

                    if ($ext === 'pdf') {
                        $updateData['path'] = $filePath;
                        $updateData['size'] = $file->getSize();
                    }
                }
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
