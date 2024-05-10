<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            '#' =>$this->id,
            'user' =>$this->user_id,
            'book' =>$this->book_id,
            'rating' =>$this->rating,
        ];
    }
}
