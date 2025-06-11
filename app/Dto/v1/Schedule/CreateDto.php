<?php

namespace App\Dto\v1\Schedule;

use App\Http\Requests\v1\Schedule\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public ?string $description,
        public UploadedFile $file
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Schedule\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            description: $request->get('description'),
            file: $request->file('file'),
        );
    }
}
