<?php

namespace App\Dto\v1\Event;

use App\Http\Requests\v1\Event\CreateRequest;

readonly class CreateDto 
{
    public function __construct(
        public array $name,
        public ?array $description,
        public int $schoolId,
        public string $startTime,
        public string $location,
    ) {}

    /**
     * Summary of from
     * @param mixed $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            schoolId: $request->get('school_id'),
            startTime: $request->get('start_time'),
            location: $request->get('location'),
        );
    }
}