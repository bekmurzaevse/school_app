<?php

namespace App\Dto\v1\Value;

use App\Http\Requests\v1\Value\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public array $text,
        public int $photoId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Value\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->name,
            photoId: $request->photo_id,
            text: $request->text
        );
    }
}
