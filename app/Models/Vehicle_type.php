<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    protected $fillable = [
        'icon',
        'type',
    ];

    public function washing_price(): HasOne
    {
        return $this->hasOne(\App\Models\Washing_price::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
