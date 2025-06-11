<?php

namespace App\Dto\v1\Albums;

use App\Http\Requests\v1\Album\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public ?array $title,
        public ?array $description,
        public ?array $photos,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Album\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            description: $request->get('description'),
            photos: $request->file('photos'),
        );
    }
}
