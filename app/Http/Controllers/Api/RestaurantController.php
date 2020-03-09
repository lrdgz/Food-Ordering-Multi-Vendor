<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RestaurantResource;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index(){
        return RestaurantResource::collection(Restaurant::paginate());
    }

    public function show(Restaurant $restaurant){
        return new RestaurantResource( $restaurant );
    }

    public function showProducts(Restaurant $restaurant){
        return new ProductResource( $restaurant->products()->paginate() );
    }
}
