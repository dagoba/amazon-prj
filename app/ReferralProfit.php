<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralProfit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'referral_id',
        'operator_id',
        'transaction_id',
        'rate_id',
        'cost',
        'created_at'
    ];
}
