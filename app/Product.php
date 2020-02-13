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
        'title', 'description', 'price',
        'discount', 'prepare_time',
        'chef', 'likes', 'user_id', 'restaurant_id', 'category_id'
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function media(){
        return $this->hasMany(Media::class, 'belongs_to', 'id');
    }
}
