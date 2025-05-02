<?php

namespace App\Dto\v1\Category;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public ?array $description,
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
        );
    }
}