<?php

namespace App\Dto\v1\File;

use App\Http\Requests\v1\File\UploadRequest;
use Illuminate\Http\UploadedFile;

readonly class UploadDto
{
    public function __construct(
        public array $name,
        public int $eventId,
        public array $description,
        public UploadedFile $file
    ) {
    }

    public static function from(UploadRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            eventId: $request->get('event_id'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}