<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
        'address_id', 'user_id'
    ];


    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function promoCodes(){
        return $this->hasMany(PromoCode::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function media(){
        return $this->hasMany(Media::class, 'belongs_to', 'id');
    }
}
