<?php

namespace App\Dto\v1\Value;

use App\Http\Requests\v1\Value\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public array $text,
        public UploadedFile $photo,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Value\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->name,
            photo: $request->photo,
            text: $request->text
        );
    }
}
