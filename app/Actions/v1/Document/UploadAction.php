<?php

namespace App\Actions\v1\Document;

use App\Dto\v1\Document\UploadDto;
use App\Models\Document;
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
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = 'documents';
        $savedPath = Storage::disk('public')->putFileAs($path, $file, $fileName);

        $data = [
            'name' => $dto->name,
            'school_id' => $dto->schoolId,
            'category_id' => $dto->categoryId,
            'description' => $dto->description,
            'path' => $savedPath
        ];

        Document::create($data);

        return static::toResponse(
            message: 'Document created'
        );
    }
}
