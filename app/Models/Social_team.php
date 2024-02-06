<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social_team extends Model
{
    //
    protected $fillable = [
        'url',
        'team_id',
        'social',
        'social_icon',
    ];

    public function teams()
    {
        return $this->belongsTo(\App\Models\Team::class, 'team_id');
    }
}
