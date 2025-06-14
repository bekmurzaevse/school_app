<?php

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\DownloadDto;
use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadAction
{
    use ResponseTrait;

    /**
     * @param int $id
     * @param \App\Dto\v1\Schedule\DownloadDto $dto
     * @return StreamedResponse
     * @throws ApiResponseException
     */
    public function __invoke(int $id, DownloadDto $dto): StreamedResponse
    {
        try {
            $school = School::first();

            $schedule = $school->schedules()->findOrFail($id);

            if ($dto->format == null || $dto->format == 'pdf') {
                return Storage::disk('public')->download($schedule->path, $schedule->name);
            } else {
                $name = explode('.', $schedule->name);
                $name = $name[0] . '.' . $dto->format;

                $schedule = $school->scheduleByName($name)->firstOrFail();

                if (!Storage::disk('public')->exists($schedule->path)) {
                    throw new ApiResponseException(strtoupper($dto->format) . " formatdagi fayl joq", 404);
                }
                return Storage::disk('public')->download($schedule->path, $schedule->name);
            }
        } catch (ModelNotFoundException $e) {
            throw new ApiResponseException('Schedule tabilmadi!', 404);
        }
    }
}
