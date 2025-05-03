<?php

namespace App\Actions\v1\File;

use App\Dto\v1\File\UploadDto;
use App\Models\File;
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
        $fileName = preg_replace('/\.[^.]+$/', '', $originalFilename);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H-i-s') . '.' . $file->extension();
        $path = 'files';
        $savedPath = Storage::disk('public')->putFileAs($path, $file, $fileName);

        $data = [
            'name' => $dto->name,
            'event_id' => $dto->eventId,
            'description' => $dto->description,
            'path' => $savedPath
        ];

        File::create($data);

        return static::toResponse(
            message: 'File uploaded successfully'
        );
    }
}
