<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'restaurant_id'
    ];
}


