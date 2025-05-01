<?php

namespace App\Dto\Category;

class CategoryDto
{
    public function __construct(
        public array $name,
        public ?array $description,
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->input('name'),
            description: $request->input('description'),
        );
    }
}