<?php

namespace App\Http\Resources;

use App\Address;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'owner' => new UserResource(User::find($this->user_id)),
            'address' => new AddressResource(Address::find($this->address_id)),
        ];
    }
}
