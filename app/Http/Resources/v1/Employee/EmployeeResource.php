<?php

namespace App\Http\Resources\v1\Employee;

use App\Http\Resources\v1\Position\PositionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'full_name' => $this->getTranslations('full_name'),
            'phone' => $this->phone,
            'photo' => $this->photo,
            'email' => $this->email,
            'position' => new PositionResource($this->position),
            'birth_date' => $this->birth_date->format('Y-m-d'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
