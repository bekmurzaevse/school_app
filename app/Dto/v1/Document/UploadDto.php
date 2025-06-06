<?php

namespace App\Dto\v1\Document;

use App\Http\Requests\v1\Document\UploadRequest;
use Illuminate\Http\UploadedFile;

readonly class UploadDto
{
    public function __construct(
        public string $name,
        public string $description,
        public UploadedFile $file
    ) {
    }

    public static function from(UploadRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
