<?php 

namespace App\Dto\v1\Employee;

use App\Http\Requests\v1\Employee\AddRequest;

readonly class AddDto
{
    public function __construct(
        public string $text,
        public int $employeeId,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Employee\AddRequest $request
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