<?php

namespace App\Dto\v1\Rule;

use App\Http\Requests\v1\Rule\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $title,
        public array $text
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Rule\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->title,
            text: $request->text,
        );
    }
}
