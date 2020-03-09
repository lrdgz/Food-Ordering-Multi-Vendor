<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street_name', 'street_number', 'suburb',
        'city', 'state', 'post_code', 'country',
    ];
}
