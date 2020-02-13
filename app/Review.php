<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'rating', 'user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }


}
