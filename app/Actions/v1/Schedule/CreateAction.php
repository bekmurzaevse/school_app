<?php

namespace App\Actions\v1\Schedule;

use App\Dto\v1\Schedule\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Schedule\CreateDto $dto
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $school = School::first();

        $pdfPath = FileUploadHelper::file($dto->file_pdf, 'schedule');
        $school->schedules()->create([
            'name' => $dto->file_pdf->getClientOriginalName(),
            'path' => $pdfPath,
            'type' => 'schedule',
            'size' => $dto->file_pdf->getSize(),
            'description' => $dto->description,
            'format' => 'pdf',
        ]);

        if ($dto->file_xls) {
            $xlsPath = FileUploadHelper::file($dto->file_xls, 'schedule');
            $school->schedules()->create([
                'name' => $dto->file_xls->getClientOriginalName(),
                'path' => $xlsPath,
                'type' => 'schedule',
                'size' => $dto->file_xls->getSize(),
                'description' => $dto->description,
                'format' => 'xls',
            ]);
        }

        if ($dto->file_csv) {
            $csvPath = FileUploadHelper::file($dto->file_csv, 'schedule');
            $school->schedules()->create([
                'name' => $dto->file_csv->getClientOriginalName(),
                'path' => $csvPath,
                'type' => 'schedule',
                'size' => $dto->file_csv->getSize(),
                'description' => $dto->description,
                'format' => 'csv',
            ]);
        }

        return static::toResponse(message: 'Schedules successfully created');
    }
}
