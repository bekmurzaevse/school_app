<?php

namespace App\Dto\v1\Schedule;

use App\Http\Requests\v1\Schedule\DownloadRequest;

readonly class DownloadDto
{
    public function __construct(
        public ?string $format
    ) {}

    public static function from(DownloadRequest $request): self
    {
        return new self(
            format: $request->get('format')
        );
    }
}