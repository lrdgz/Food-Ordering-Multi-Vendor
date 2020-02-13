<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(CartItem::class);
    }

    public function total(){

    }

}
