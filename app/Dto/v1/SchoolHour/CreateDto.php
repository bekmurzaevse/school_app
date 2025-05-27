<?php

namespace App\Dto\v1\SchoolHour;

use App\Http\Requests\v1\SchoolHour\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $title,
        public array $workday,
        public array $holiday,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\SchoolHour\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            workday: $request->get('workday'),
            holiday: $request->get('holiday'),
        );
    }
}
