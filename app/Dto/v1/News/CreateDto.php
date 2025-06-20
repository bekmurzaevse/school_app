<?php

namespace App\Dto\v1\News;

use App\Http\Requests\v1\News\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public array $title,
        public array $shortContent,
        public array $content,
        public UploadedFile $coverImage,
        public ?array $tags
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\News\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            shortContent: $request->get('short_content'),
            content: $request->get('content'),
            coverImage: $request->file('cover_image'),
            tags: $request->get('tags')
        );
    }
}
