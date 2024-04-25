<?php

namespace App\Http\Resources\Address;

use App\Http\Resources\User\UserShortResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressUserModelMountedResource extends JsonResource
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
            'City' => $this->City,
            'Street' => $this->Street,
            'House' => $this->House,
            'Entrance' => $this->Entrance,
            'Apartment' => $this->Apartment,
            'addresses_user_id' => $this->addresses_user_id,
            'users' => UserShortResource::make(User::all()->where('id', $this->addresses_user_id)->first()),
        ];
    }
}
