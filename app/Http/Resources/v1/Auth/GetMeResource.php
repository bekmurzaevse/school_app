<?php

namespace App\Http\Resources\v1\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetMeResource extends JsonResource
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
            'full_name' => $this->full_name,
            'username' => $this->username,
            'description' => $this->description,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'roles' => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()?->map(fn($permission) => $permission->name),
        ];
    }
}