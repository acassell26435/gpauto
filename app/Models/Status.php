<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'status',
    ];

    public function team_task()
    {
        return $this->hasOne(\App\Models\Team_task::class);
    }

    public function appointment()
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
