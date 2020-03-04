<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Restaurant;
use Illuminate\Http\Request;

class VendorRestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api', 'is_vendor', 'verified_email'])->except('index');
    }


    public function store(RestaurantRequest $request){

        $address = Address::create([
            'street_name' => $request->street_name,
            'street_number' => $request->street_number,
            'suburb' => $request->suburb,
            'city' => $request->city,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'country' => $request->country,
        ]);

        $restaurant = Restaurant::create([
            'title' => $request->title,
            'description' => $request->description,
            'address_id' => $address->id,
            'user_id' => auth()->id(),
        ]);

        return new RestaurantResource( $restaurant );
    }

    public function edit(RestaurantRequest $restaurant, Request $request){

    }

    public function delete(RestaurantRequest $restaurant){

    }

}
