<?php

namespace App\Dto\v1\Club;

use App\Http\Requests\v1\Club\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
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
     * @param \App\Http\Requests\v1\Club\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->name,
            text: $request->text,
            schedule: $request->schedule,
            photo: $request->photo
        );
    }
}
