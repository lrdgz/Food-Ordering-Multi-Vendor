<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount', 'restaurant_id', 'code', 'end_at', 'status',
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
