<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team_task extends Model
{
    protected $fillable = [
        'team_id',
        'user_id',
        'task',
        'status_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Team::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
}
