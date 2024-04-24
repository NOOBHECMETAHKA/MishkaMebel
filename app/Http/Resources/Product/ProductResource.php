<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Discount\DiscountResource;
use App\Http\Resources\Photo\PhotoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'url_name' => $this->url_name,
            'name' => $this->name,
            'description' => $this->description,
            'guarantee' => $this->guarantee,
            'price' => $this->price,
            'category' => $this->category,
            'products_product_id' => $this->products_product_id,
            'discounts' => new DiscountResource($this->discounts),
            'photos' => PhotoResource::collection($this->photos),
            'is_deleted' => $this->is_deleted,
        ];
    }
}
