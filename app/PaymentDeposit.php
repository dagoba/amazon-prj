<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDeposit extends Model
{
    protected $fillable = [
        'transaction_id',
        'operator_id',
        'user_id',
        'amount',
        'description',
        'payment_id',
        'status'
    ];
}
