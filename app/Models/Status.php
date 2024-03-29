<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    protected $fillable = [
        'status',
    ];

    public function team_task(): HasOne
    {
        return $this->hasOne(\App\Models\Team_task::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
