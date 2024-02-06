<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'sex', 'dob', 'mobile', 'phone', 'address', 'join_date', 'status', 'post',
    ];

    public function social_teams(): HasOne
    {
        return $this->hasOne(\App\Models\Social_team::class);
    }

    public function team_task(): HasOne
    {
        return $this->hasOne(\App\Models\Team_task::class);
    }
}
