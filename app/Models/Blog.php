<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $casts = [
        'date' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'img',
        'user_id',
        'date',
        'dtl',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
