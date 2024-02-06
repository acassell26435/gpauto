<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Vehicle_company extends Model
{
    protected $fillable = [
        'vehicle_company',
    ];

    public function vehicle_modal(): HasOne
    {
        return $this->hasOne(\App\Models\Vehicle_modal::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
