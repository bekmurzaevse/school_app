<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseException extends Exception
{
    public function __construct(
        protected $message,
        protected $code
    ) {}

    /**
     * Summary of render
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'status' => $this->code,
            'message' => $this->message,
        ], $this->code);
    }
}
