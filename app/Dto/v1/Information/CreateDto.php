<?php

namespace App\Dto\v1\Information;

use App\Http\Requests\v1\Information\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $count,
        public array $title,
        public ?array $description,
        public int $schoolId,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Information\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            count: $request->get('count'),
            title: $request->get('title'),
            schoolId: $request->get('school_id'),
            description: $request->get('description'),
        );
    }
}
