<?php

namespace App\Dto\v1\Vacancy;

use App\Http\Requests\v1\Vacancy\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $title,
        public int $salary,
        public ?bool $active,
        public array $content
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Vacancy\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->title,
            content: $request->content,
            active: $request->active,
            salary: $request->salary,
        );
    }
}
