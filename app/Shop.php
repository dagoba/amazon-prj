<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'seller',
        'category',
        'rating',
        'price',
        'selling_price',
        'percent',
        'period_percent',
        'referral_percentage',
        'period_referral_percentage',
        'quantity_in_stock',
        'quantity_sold',
        'minimum_balance',
        'minimum_bet',
        'quantity_per_day',
        'quantity_per_week',
        'quantity_per_month',
        'profit_per_day',
        'profit_per_week',
        'profit_per_month'
    ];
}
