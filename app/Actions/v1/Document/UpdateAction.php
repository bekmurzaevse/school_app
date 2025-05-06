<?php

namespace App\Actions\v1\Document;

use App\Dto\v1\Document\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Document\DocumentResource;
use App\Models\Document;
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
     * @param \App\Dto\v1\Document\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $doc = Document::findOrFail($id);

            $file = $dto->file;
            $filePath = $doc->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $originalFilename = $file->getClientOriginalName();
            $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
            $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();

            $savedPath = Storage::disk('public')->putFileAs('documents', $file, $fileName);

            $doc->update([
                'name' => $dto->name,
                'school_id' => $dto->schoolId,
                'category_id' => $dto->categoryId,
                'description' => $dto->description,
                'path' => $savedPath
            ]);

            return static::toResponse(
                message: 'Document Updated',
                data: new DocumentResource($doc)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }



    }
}
