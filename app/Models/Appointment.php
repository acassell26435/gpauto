<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_company_id',
        'vehicle_modal_id',
        'vehicle_types_id',
        'washing_plan_id',
        'status_id',
        'appointment_date',
        'vehicle_no',
        'time_frame',
        'appx_hour',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function vehicle_company()
    {
        return $this->belongsTo(\App\Models\Vehicle_company::class);
    }

    public function vehicle_modal()
    {
        return $this->belongsTo(\App\Models\Vehicle_modal::class);
    }

    public function vehicle_type()
    {
        return $this->belongsTo(\App\Models\Vehicle_type::class, 'vehicle_types_id');
    }

    public function washing_plan()
    {
        return $this->belongsTo(\App\Models\Washing_plan::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
