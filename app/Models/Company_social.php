<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_social extends Model
{
    protected $fillable = [
        'link',
        'social_site',
        'social_icon',
    ];
}
