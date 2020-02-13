<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'amount', 'status', 'transaction_status', 'ref_number','customer_id', 'vendor_id'
    ];


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
