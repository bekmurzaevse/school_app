<?php

namespace App\Dto\v1\History;

use App\Http\Requests\v1\History\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $year,
        public array $text,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\History\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            year: $request->get('year'),
            text: $request->get('text'),
        );
    }
}