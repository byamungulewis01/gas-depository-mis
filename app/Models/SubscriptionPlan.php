<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    //
    protected $fillable = ['name', 'price', 'duration', 'status','description','is_free_plan'];
}
