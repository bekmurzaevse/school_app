<?php 

namespace App\Dto\v1\Main;

use App\Http\Requests\v1\Main\AddRequest;

readonly class AddDto
{
    public function __construct(
        public string $text,
        public int $employeeId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Main\AddRequest $request
     * @return AddDto
     */
    public static function from(AddRequest $request): self
    {
        return new self(
            text: $request->get('text'),
            employeeId: $request->get('employee_id'),
        );
    }
}