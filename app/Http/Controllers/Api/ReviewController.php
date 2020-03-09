<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Product $product){
        return ReviewResource::collection($product->reviews()->paginate());
    }
}
