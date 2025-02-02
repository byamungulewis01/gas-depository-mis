<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $fillable = [
        'bottle_id',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'remaining_weight',
        'notes',
        'code',
        'status',
        'approved_at',
        'approved_by'
    ];

    public function bottle()
    {
        return $this->belongsTo(Bottle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

}
