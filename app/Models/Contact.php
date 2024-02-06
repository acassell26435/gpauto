<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'c_name',
        'logo',
        'logo_two',
        'mobile',
        'phone',
        'address',
        'email',
        'website',
        'inspect',
        'rightclick',
    ];
}
