<?php 

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\DownloadDto;
use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Requests\v1\Schedule\DownloadRequest;

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

            $format = strtolower($dto->format ?? 'pdf');

            $allowedFormats = ['pdf', 'xlsx', 'csv'];
            if (!in_array($format, $allowedFormats)) {
                throw new ApiResponseException("Qate format tan'landi: $format", 422);
            }

            $baseName = pathinfo($schedule->name, PATHINFO_FILENAME);
            $fileName = $baseName . '.' . $format;
            $filePath = 'schedule/' . $fileName;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException(strtoupper($format) . " formatdagi fayl joq", 404);
            }

            return Storage::disk('public')->download($filePath, $fileName);

        } catch (ModelNotFoundException $e) {
            throw new ApiResponseException('Schedule tabilmadi', 404);
        }
    }
}
