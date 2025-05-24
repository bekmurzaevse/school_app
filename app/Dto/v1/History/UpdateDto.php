<?php

namespace App\Dto\v1\History;

use App\Http\Requests\v1\History\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $year,
        public array $text,
        public int $schoolId,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\History\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            year: $request->get('year'),
            text: $request->get('text'),
            schoolId: $request->get('school_id'),
        );
    }
}