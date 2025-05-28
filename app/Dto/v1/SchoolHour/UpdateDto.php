<?php

namespace App\Dto\v1\SchoolHour;

use App\Http\Requests\v1\SchoolHour\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $title,
        public array $workday,
        public array $holiday,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\SchoolHour\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            workday: $request->get('workday'),
            holiday: $request->get('holiday'),
        );
    }
}
