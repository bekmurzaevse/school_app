<?php

namespace App\Http\Resources\v1\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'about' => $this->history,
            'missions' => optional($this->targets)->map(function ($target) {
                return [
                    'id' => $target->id,
                    'name' => $target->name,
                    'description' => $target->description,
                ];
            }),
            'histories' => optional($this->histories)->map(function ($history) {
                return [
                    'id' => $history->id,
                    'year' => $history->year,
                    'text' => $history->text,
                ];
            }),
            'values' => optional($this->values)->map(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            })
        ];
    }
}
