<?php

namespace App\Dto\v1\Target;

use App\Http\Requests\v1\Target\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public array $description,
        public int $schoolId,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Target\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            schoolId: $request->get('school_id'),
        );
    }
}