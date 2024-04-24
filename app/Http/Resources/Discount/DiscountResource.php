<?php

namespace App\Http\Resources\Discount;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'percent' => $this->percent,
            'expiration_discount' => $this->expiration_discount,
            'discounts_product_id' => $this->discounts_product_id,
        ];
    }
}
