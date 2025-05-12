<?php

namespace App\Dto\v1\Photos;

use App\Http\Requests\v1\Photo\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public UploadedFile $photo,
        public string $title,
        public ?int $albumId,
        public ?array $description,
    ) {
    }

    public static function from(UpdateRequest $request): self
    {
        return new self(
            photo: $request->file('photo'),
            title: $request->get('title'),
            // path: $request->get('path'),
            albumId: $request->get(key: 'album_id'),
            description: $request->get('description'),
        );
    }
}
