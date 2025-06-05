<?php 

namespace App\Actions\v1\Schedule;

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
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return StreamedResponse
     */
    public function __invoke(int $id): StreamedResponse
    {
        try {
            $school = School::first();
            $schedule = $school->schedules()->findOrFail($id);

            $filePath = $schedule->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Schedule Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $schedule->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Schedule Not Found', 404);
        }
    }
}