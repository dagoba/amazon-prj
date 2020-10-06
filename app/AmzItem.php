<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmzItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'brand',
        'price',
        'min_price',
        'net',
        'fba_fees',
        'lqs',
        'category',
        'sellers',
        'rank',
        'est_sales',
        'est_revenue',
        'reviews_count',
        'available_from',
        'rating',
        'seller',
        'weight',
        'shipping_weight',
        'size',
        'colors',
        'oversize',
        'asin',
        'url',
    ];
}
