<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description', 'price',
        'discount', 'prepare_time',
        'chef','likes','user_id','restaurant_id'
    ];
}
