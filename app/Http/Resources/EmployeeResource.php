<?php

namespace App\Http\Resources;

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
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'full_name' => $this->getTranslation('full_name', app()->getLocale()),
            'phone' => $this->phone,
            'photo' => new PhotoResource($this->photo),
            'email' => $this->email,
            'position' => new PositionResource($this->position),
            'birth_date' => $this->birth_date
        ];
    }
}
