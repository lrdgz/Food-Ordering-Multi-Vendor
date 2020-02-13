<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'cart_id', 'qty', 'price', 'line_total'
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product(){
        return $this->hasOne(Product::class);
    }
}
