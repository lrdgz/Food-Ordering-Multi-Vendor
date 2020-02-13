<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id', 'invoice_id', 'amount_before',
        'amount_after', 'line_total','platform_share',
    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
