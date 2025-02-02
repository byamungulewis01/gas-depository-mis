<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    //
    protected $fillable = [
        'name',
        'amount',
        'weight',
        'status',
    ];

}
