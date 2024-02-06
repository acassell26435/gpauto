<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Washing_price extends Model
{
    protected $fillable = [
        'washing_plan_id',
        'vehicle_type_id',
        'price',
        'duration',
    ];

    public function washing_plan()
    {
        return $this->belongsTo(\App\Models\Washing_plan::class);
    }

    public function vehicle_type()
    {
        return $this->belongsTo(\App\Models\Vehicle_type::class);
    }
}
