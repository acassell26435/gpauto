<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
     protected $fillable = [
      'slider_section',
      'about_section',
      'service_section',
      'gallery_section',
      'facts_section',
      'team_section',
      'plan_section',
      'appointment_section',
      'testinomial_section',
      'blog_section',
      'client_section'
    ];
}
