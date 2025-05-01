<?php 

namespace App\Dto\v1\Albums;

use App\Http\Requests\v1\Album\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $title,
        public int $schoolId,
        public ?array $description,
    ) {
    }

    
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            schoolId: $request->get(key: 'school_id'),
            description: $request->get('description'),
        );
    }
}