<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentWithdrawal extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'operator_id',
        'amount',
        'description',
        'user_comment',
        'operator_comment',
        'requisites',
        'payment_id',
        'status'
    ];
}
