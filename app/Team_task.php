<?php

namespace App;

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
        return $this->belongsTo(\App\User::class);
    }

    public function team()
    {
        return $this->belongsTo(\App\Team::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Status::class);
    }
}
