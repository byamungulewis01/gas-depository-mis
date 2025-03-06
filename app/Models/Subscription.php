<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = [
        'tailor_id',
        'subscription_plan_id',
        'start_date',
        'end_date',
        'status',
        'is_trial',
        'payment_method',
        'payment_reference',
        'payment_date',
        'payment_status',
        'amount',
        'note'
    ];

    // casts
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_trial' => 'boolean',
        'payment_date' => 'datetime',
    ];

}
