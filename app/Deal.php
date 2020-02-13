<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'end_at', 'qty', 'discount', 'restaurant_id'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
