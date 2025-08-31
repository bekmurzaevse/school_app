<?php

namespace App\Http\Resources\v1\Faq;

use App\Http\Resources\v1\School\SchoolResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            // 'school' => new SchoolResource($this->school),
            'question' => $this->getTranslations('question'),
            'answer' => $this->getTranslations('answer'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
