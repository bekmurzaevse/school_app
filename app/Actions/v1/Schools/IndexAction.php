<?php 

namespace App\Actions\v1\Schools;

use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction 
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        $schools = School::all();
        
        return static::toResponse(
            message: "School list",
            data: $schools
        );      
    }
}