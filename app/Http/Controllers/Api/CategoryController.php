<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::paginate());
    }

    public function showProducts(Category $category){
        return new ProductResource( $category->products()->paginate() );
    }
}
