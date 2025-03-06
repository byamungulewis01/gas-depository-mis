<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'tailor_id',
        'name',
        'phone',
        'measure',
        'note',
    ];

    protected $casts = [
        'measure' => 'array',
    ];
}
