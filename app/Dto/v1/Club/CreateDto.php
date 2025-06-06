<?php

namespace App\Dto\v1\Club;

use App\Http\Requests\v1\Club\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public array $text,
        public array $schedule,
        public UploadedFile $photo,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Club\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->name,
            text: $request->text,
            schedule: $request->schedule,
            photo: $request->photo
        );
    }
}
