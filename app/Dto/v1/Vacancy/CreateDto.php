<?php

namespace App\Dto\v1\Vacancy;

use App\Http\Requests\v1\Vacancy\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $title,
        public int $salary,
        public array $content
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Vacancy\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->title,
            content: $request->content,
            salary: $request->salary,
        );
    }
}
