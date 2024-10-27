<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'payment_method',
        'payment_status',
        'paid_at',
        'payment_proof',
        'reservation_id',
        'code_payment_success'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
