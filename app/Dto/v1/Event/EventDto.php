<?php

namespace App\Dto\v1\Event;

use Illuminate\Http\Request;

class EventDto
{
    public function __construct(
        public readonly array $name,
        public readonly array $description,
        public readonly int $school_id,
        public readonly string $start_time,
        public readonly string $location,
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->input('name'),
            description: $request->input('description'),
            school_id: $request->input('school_id'),
            start_time: $request->input('start_time'),
            location: $request->input('location'),
        );
    }
}