<?php

namespace App\Http\Resources\OrderList;

use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdersListUserModelMountedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price_sum_product' => $this->price_sum_product,
            'count_product' => $this->count_product,
            'product_order_list_id' => $this->product_order_list_id,
            'order_order_list_id' => $this->order_order_list_id,
            'products' => ProductResource::make(Product::all()->where('id', $this->product_order_list_id)->first())
        ];
    }
}
