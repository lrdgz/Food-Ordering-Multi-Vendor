<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'invoice_id', 'pending'
    ];

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
