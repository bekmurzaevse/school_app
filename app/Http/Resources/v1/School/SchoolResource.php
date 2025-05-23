<?php

namespace App\Http\Resources\v1\School;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'history' => $this->history,
            'phone' => $this->phone,
            'location' => $this->location,
            'description' => $this->description,
        ];
    }
}
