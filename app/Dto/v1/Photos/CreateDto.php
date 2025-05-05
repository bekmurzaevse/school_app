<?php

namespace App\Dto\v1\Photos;

use App\Http\Requests\v1\Photo\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public array $photos,
        public string $title,
        // public string $path,
        public ?int $albumId,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Photo\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            photos: $request->file('photos'),
            title: $request->get('title'),
            // path: $request->get('path'),
            albumId: $request->get(key: 'album_id'),
            description: $request->get('description'),
        );
    }
}
