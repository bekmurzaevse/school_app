<?php

namespace App\Actions\v1\Document;

use App\Exceptions\ApiResponseException;
use App\Models\Document;
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
            $document = Document::findOrFail($id);

            $filePath = $document->path;

            if (!Storage::disk('public')->exists($filePath)) {
                throw new ApiResponseException('Document Not Found', 404);
            }

            return Storage::disk('public')->download($filePath, $document->name);
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}
