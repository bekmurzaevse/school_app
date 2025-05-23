<?php

namespace App\Dto\v1\Document;

use App\Http\Requests\v1\Document\UploadRequest;
use Illuminate\Http\UploadedFile;

readonly class UploadDto
{
    public function __construct(
        public array $name,
        public int $schoolId,
        public int $categoryId,
        public array $description,
        public UploadedFile $file
        ) {
    }

    public static function from(UploadRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            schoolId: $request->get('school_id'),
            categoryId: $request->get('category_id'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
