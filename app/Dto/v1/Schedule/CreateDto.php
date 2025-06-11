<?php

namespace App\Dto\v1\Schedule;

use App\Http\Requests\v1\Schedule\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public ?string $description,
        public UploadedFile $file_pdf,
        public ?UploadedFile $file_xls,
        public ?UploadedFile $file_csv,
    ) {}

    public static function from(CreateRequest $request): self
    {
        return new self(
            description: $request->get('description'),
            file_pdf: $request->file('file_pdf'),
            file_xls: $request->file('file_xls'),
            file_csv: $request->file('file_csv'),
        );
    }
}