<?php

namespace App\Dto\V1\Event;

use App\Http\Requests\v1\Event\UpdateRequest;

readonly class UpdateDto 
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
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
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