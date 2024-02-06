<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function vehicle_company(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Vehicle_company::class);
    }

    public function vehicle_modal(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Vehicle_modal::class);
    }

    public function vehicle_type(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Vehicle_type::class, 'vehicle_types_id');
    }

    public function washing_plan(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Washing_plan::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne('App\Payment');
    }
}
