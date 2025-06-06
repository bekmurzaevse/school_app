<?php

namespace App\Dto\v1\Value;

use App\Http\Requests\v1\Value\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public UploadedFile $photo,
        public array $text
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Value\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->name,
            photo: $request->photo,
            text: $request->text
        );
    }
}
