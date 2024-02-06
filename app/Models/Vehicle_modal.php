<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle_modal extends Model
{
    protected $fillable = [
        'vehicle_company_id',
        'vehicle_modal',
    ];

    public function vehicle_company()
    {
        return $this->belongsTo(\App\Models\Vehicle_company::class);
    }

    public function appointment()
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
