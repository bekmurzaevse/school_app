<?php 

namespace App\Actions\v1\Positions;

use App\Dto\v1\Positions\CreateDto;
use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Positions\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'school_id' => $dto->schoolId,
            'description' => $dto->description
        ];
        Position::create($data);

        return static::toResponse(
            message: "Lawazim jaratildi!"
        );
    }
}