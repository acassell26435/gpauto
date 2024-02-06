<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment_user extends Model
{
    protected $fillable = [
        'user_id',
        'appointment_id',
        'discount',
        'advance',
        'payment_mode_id',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function appointment()
    {
        return $this->belongsTo(\App\Models\Appointment::class);
    }

    public function payment_mode()
    {
        return $this->belongsTo(\App\Models\Payment_mode::class);
    }
}
