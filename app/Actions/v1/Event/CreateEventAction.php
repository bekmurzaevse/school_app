<?php 

namespace App\Actions\v1\Event;

use App\Dto\v1\Event\EventDto;
use App\Models\Event;
use Illuminate\Http\JsonResponse;

class CreateEventAction
{
    public function __invoke(EventDto $dto): JsonResponse
    {
        $event = Event::create([
            'name' => json_encode($dto->name),
            'description' => json_encode($dto->description),
            'school_id' => $dto->school_id,
            'start_time' => $dto->start_time,
            'location' => $dto->location,
        ]);

        return response()->json([
            'message' => __('Event created successfully.'),
            'data' => $event,
        ], 201);
    }
}
