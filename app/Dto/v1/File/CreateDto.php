<?php

namespace App\Dto\v1\File;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public ?array $description,
        public string $path,
        public int $eventId,
    ) {}

    /**
     * Summary of from
     * @param mixed $request
     * @return CreateDto
     */
    public static function from($request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            path: $request->get('path'),
            eventId: $request->get('event_id'),
        );
    }
    
        
}