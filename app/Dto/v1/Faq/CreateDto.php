<?php

namespace App\Dto\v1\Faq;

use App\Http\Requests\v1\Faq\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $schoolId,
        public array $question,
        public array $answer,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Faq\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            schoolId: $request->get('school_id'),
            question: $request->get('question'),
            answer: $request->get('answer'),
        );
    }
}
