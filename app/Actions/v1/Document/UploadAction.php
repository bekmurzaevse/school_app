<?php

namespace App\Actions\v1\Document;

use App\Dto\v1\Document\UploadDto;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Document\UploadDto $dto
     * @return JsonResponse
     */
    public function __invoke(UploadDto $dto): JsonResponse
    {
        $file = $dto->file;

        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();

        $savedPath = Storage::disk('public')->putFileAs('documents', $file, $fileName);

        School::firstOrFail()->documents()->create([
            'name' => $fileName,
            'path' => $savedPath,
            'type' => 'document',
            'size' => $file->getSize(),
            'description' => $dto->description,
        ]);

        return static::toResponse(
            message: 'Document created'
        );
    }
}
