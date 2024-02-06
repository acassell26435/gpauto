<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
