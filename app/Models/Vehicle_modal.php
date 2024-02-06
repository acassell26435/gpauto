<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicle_modal extends Model
{
    protected $fillable = [
        'vehicle_company_id',
        'vehicle_modal',
    ];

    public function vehicle_company(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Vehicle_company::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
