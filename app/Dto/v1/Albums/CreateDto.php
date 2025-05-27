<?php

namespace App\Dto\v1\Albums;

use App\Http\Requests\v1\Album\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $title,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Album\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            description: $request->get('description'),
        );
    }
}
