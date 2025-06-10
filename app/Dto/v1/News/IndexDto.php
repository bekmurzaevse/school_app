<?php

namespace App\Dto\v1\News;

use App\Http\Requests\v1\News\IndexRequest;

readonly class IndexDto
{
    public function __construct(
        public ?int $page,
        public ?int $perPage,
        public ?string $sortBy,
        public ?string $sortOrder,
        public ?string $fromDate,
        public ?string $toDate,
        public ?array $tags,
        public ?string $search
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\News\IndexRequest $request
     * @return IndexDto
     */
    public static function from(IndexRequest $request): self
    {
        return new self(
            page: $request->get('page'),
            perPage: $request->get('per_page'),
            sortBy: $request->get('sort_by'),
            sortOrder: $request->get('sort_order'),
            fromDate: $request->get('from_date'),
            toDate: $request->get('to_date'),
            tags: $request->get('tags'),
            search: $request->get('search')
        );
    }
}