<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'street_name' => ( !is_null($this->street_name) ) ? $this->street_name : 'Not Available',
            'street_number' =>( !is_null($this->street_number) ) ? $this->street_number : 'Not Available',
            'suburb' => ( !is_null($this->suburb) ) ? $this->suburb : 'Not Available',
            'city' => ( !is_null($this->city) ) ? $this->city : 'Not Available',
            'state' => ( !is_null($this->state) ) ? $this->state : 'Not Available',
            'post_code' => ( !is_null($this->post_code) ) ? $this->post_code : 'Not Available',
            'country' =>( !is_null($this->country) ) ? $this->country : 'Not Available',
        ];
    }
}
