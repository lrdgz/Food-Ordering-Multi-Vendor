<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status',
    ];

    public function items(){
        return $this->hasMany(InvoiceLine::class);
    }

    public function vendor(){
        return $this->belongsTo(User::class);
    }


}
