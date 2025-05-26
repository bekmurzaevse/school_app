<?php

namespace App\Dto\v1\Value;

use App\Http\Requests\v1\Value\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public int $schoolId,
        public int $photoId,
        public array $text
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Value\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->name,
            schoolId: $request->school_id,
            photoId: $request->photo_id,
            text: $request->text
        );
    }
}
