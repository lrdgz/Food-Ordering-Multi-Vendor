<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password',
        'last_name', 'email_token', 'mobile_token',
        'mobile', 'verified_email', 'verified_mobile',
        'billing_address', 'shipping_address', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function restaurant(){
        return $this->hasOne(Restaurant::class);
    }

    public function customerOrders(){
        return $this->hasMany(Order::class);
    }

    public function vendorOrders(){
        return $this->hasManyThrough(Order::class, Product::class);
    }

    public function customerPayments(){
        return $this->hasMany(Payment::class, 'customer_id', 'id');
    }

    public function vendorPayments(){
        return $this->hasMany(Payment::class, 'vendor_id', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function favourites(){
        return $this->hasMany(Favourite::class);
    }

    public function follows(){
        return $this->hasMany(Follow::class);
    }

    public function billingAddress(){
        return $this->hasMany(Address::class, 'id', 'billing_address');
    }

    public function shippingAddress(){
        return $this->hasMany(Address::class, 'id', 'shipping_address');
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

}
