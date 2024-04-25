<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Address\AddressUserModelMountedResource;
use App\Http\Resources\OrderList\OrdersListUserModelMountedResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'ordered_in' => $this->ordered_in,
            'total_cost' => $this->total_cost,
            'statuses' => StatusResource::make($this->statuses),
            'addresses' => AddressUserModelMountedResource::make($this->addresses),
            'order_lists' => OrdersListUserModelMountedResource::collection($this->order_lists),
            'enabling_deliveries' => $this->enabling_deliveries,
        ];
    }
}
