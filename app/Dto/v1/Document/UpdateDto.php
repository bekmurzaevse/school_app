<?php

namespace App\Dto\v1\Document;

use App\Http\Requests\v1\Document\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public int $categoryId,
        public array $description,
        public UploadedFile $file
        ) {
    }

    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            categoryId: $request->get('category_id'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
