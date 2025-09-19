<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqsIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'faqs' => $this->faqs->map(function ($faq) {
                return [
                    'id' => $faq->id,
                    'question' => $faq->getTranslations('question'),
                    'answer' => $faq->getTranslations('answer'),
                ];
            }),
            'contanct_info' => [
                'phone' => $this->phone,
                'location' => $this->location,
            ],
        ];
    }
}
