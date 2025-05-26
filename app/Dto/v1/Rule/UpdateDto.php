<?php

namespace App\Dto\v1\Rule;

use App\Http\Requests\v1\Rule\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $title,
        public array $text,
        public int $schoolId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Rule\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            text: $request->input('text'),
            schoolId: $request->input('school_id'),
        );
    }
}
