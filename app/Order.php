<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cart_id', 'total', 'tax', 'delivery', 'status'
    ];

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function vendors(){
        $vendors = [];

        //TODO: get the cart
        $cart = $this->cart;
        //TODO: get the cart items
        $items = $cart->items;
        //TODO: foreach cart item we get the vendor

        /**
         * @var $item CartItem
         */
        foreach($items as $item){
            array_push($vendors, $item->product()->owner);
        }

        return array_unique($vendors);
    }

    public function total(){

    }


}
