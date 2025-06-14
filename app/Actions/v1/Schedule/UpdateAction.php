<?php

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
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
            $schedule = $school->schedules()->findOrFail($id);

            if (!Str::endsWith($schedule->name, $dto->file->getClientOriginalExtension())) {
                $data = explode('.', $schedule->name);
                $reqExtension = $dto->file->getClientOriginalExtension();
                $extension = end($data);

                return static::toResponse(
                    code: 422,
                    message: "Qa'te mag'liwmat berildi! Siz $extension fayldin' ornina, $reqExtension tipindegi fayl jiberdin'iz!!!",
                );
            }

            if (Storage::disk('public')->exists($schedule->path)) {
                Storage::disk('public')->delete($schedule->path);
            }

            $path = FileUploadHelper::file($dto->file, 'schedule');

            $schedule->update([
                'name' => $dto->file->getClientOriginalName(),
                'path' => $path,
                'type' => 'schedule',
                'size' => $dto->file->getSize(),
                'description' => $dto->description ?? null,
            ]);

            return static::toResponse(
                message: 'Schedule awmetli janalandi',
                data: $schedule
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Schedule tabilmadi', 404);
        }
    }
}
