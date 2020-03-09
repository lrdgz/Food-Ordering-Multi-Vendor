<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return ProductResource::collection(Product::paginate());
    }

    public function show(Product $product){
        return new ProductResource( $product->load([ 'restaurant', 'reviews', 'owner', 'tags', 'category', 'media' ]) );
    }
}
