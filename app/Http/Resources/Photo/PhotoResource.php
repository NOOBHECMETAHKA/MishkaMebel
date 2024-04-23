<?php

namespace App\Http\Resources\Photo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'link' => $this->ImageUrl,
            'product_photo_id' => $this->product_photo_id,
        ];
    }
}
