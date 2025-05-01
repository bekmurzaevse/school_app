<?php

namespace App\Dto\v1\Positions;

use App\Http\Requests\v1\Position\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public int $schoolId,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Position\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            schoolId: $request->get(key: 'school_id'),
            description: $request->get('description'),
        );
    }
}
