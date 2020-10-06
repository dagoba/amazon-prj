<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'user_id',
        'shop_id',
        'cost',
    ];
}
