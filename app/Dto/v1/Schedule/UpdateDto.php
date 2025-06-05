<?php 

namespace App\Dto\v1\Schedule;

use App\Http\Requests\v1\Schedule\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public ?string $description,
        public UploadedFile $file
    ) {}

    public static function from(UpdateRequest $request): self
    {
        return new self(
            description: $request->get('description'),
            file: $request->file('file'),
        );
    }
}