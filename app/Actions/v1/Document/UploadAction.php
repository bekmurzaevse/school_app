<?php

namespace App\Actions\v1\Document;

use App\Dto\v1\Document\UploadDto;
use App\Models\Attachment;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadAction
{
    use ResponseTrait;

    public function __invoke(UploadDto $dto)
    {
        $file = $dto->file;

        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();

        $savedPath = Storage::disk('public')->putFileAs('documents', $file, $fileName);

        $data = [
            'name' => $dto->name,
            'path' => $savedPath,
            'type' => 'document',
            'size' => $file->getSize(),
            'attachable_type' => School::class,
            'attachable_id' => School::first()->id,
            'description' => $dto->description,
        ];

        Attachment::create($data);

        return static::toResponse(
            message: 'Document created'
        );
    }
}
