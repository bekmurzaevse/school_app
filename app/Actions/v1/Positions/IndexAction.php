<?php 

namespace App\Actions\v1\Positions;

use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        $positions = Position::where('school_id', 1)->get();

        return static::toResponse(
            message: "1 Mektep Lawazimlar dizimi",
            data: $positions
        );
    }
}