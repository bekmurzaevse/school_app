<?php

namespace App\Dto\v1\File;

use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public ?array $description,
        public ?string $path,
        public int $eventId,
        public UploadedFile $file,
    ) {}

    /**
     * Summary of from
     * @param mixed $request
     * @return UpdateDto
     */
    public static function from($request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            path: $request->get('path'),
            eventId: $request->get('event_id'),
            file: $request->file('file')
        );
    }
}