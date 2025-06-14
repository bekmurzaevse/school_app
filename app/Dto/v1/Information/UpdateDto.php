<?php

namespace App\Dto\v1\Information;

use App\Http\Requests\v1\Information\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public int $count,
        public array $title,
        public ?array $description,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Information\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            count: $request->get('count'),
            title: $request->get('title'),
            description: $request->get('description'),
        );
    }
}
