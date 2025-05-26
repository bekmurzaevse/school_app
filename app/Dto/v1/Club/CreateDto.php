<?php

namespace App\Dto\v1\Club;

use App\Http\Requests\v1\Club\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public int $schoolId,
        public array $text,
        public array $schedule,
        public int $photoId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Club\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->name,
            schoolId: $request->school_id,
            text: $request->text,
            schedule: $request->schedule,
            photoId: $request->photo_id
        );
    }
}
