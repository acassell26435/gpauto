<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team_task extends Model
{
    protected $fillable = [
        'team_id',
        'user_id',
        'task',
        'status_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
}
