<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArbitraryBalanceChange extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'operator_id',
        'operation',
        'amount',
        'description'
    ];
}
