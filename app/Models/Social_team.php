<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social_team extends Model
{
    //
    protected $fillable = [
        'url',
        'team_id',
        'social',
        'social_icon',
    ];

    public function teams(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Team::class, 'team_id');
    }
}
