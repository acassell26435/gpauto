<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opening_hour extends Model
{
    protected $fillable = [
        'day',
        'opening_time',
        'closing_time',
    ];
}
