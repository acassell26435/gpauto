<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Washing_plan extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function washing_include(): HasOne
    {
        return $this->hasOne(\App\Models\Washing_plan_include::class);
    }

    public function washing_price(): HasOne
    {
        return $this->hasOne(\App\Models\Washing_price::class);
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(\App\Models\Appointment::class);
    }
}
