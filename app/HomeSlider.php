<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'detail',
        'button1',
        'button1_text',
        'button1_link',
        'button2',
        'button2_text',
        'button2_link',
        'image',
    ];
}
