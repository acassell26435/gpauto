<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Payment_mode extends Model
{
    protected $fillable = [
        'mode',
    ];

    public function appointment_user(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment_user::class);
    }
}
