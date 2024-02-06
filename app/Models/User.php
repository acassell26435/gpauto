<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'sex', 'dob', 'mobile', 'phone', 'address', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team_task(): HasOne
    {
        return $this->hasOne(\App\Models\Team_task::class);
    }

    public function blogs(): HasOne
    {
        return $this->hasOne(\App\Models\Blog::class);
    }

    public function appointment(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Appointment::class, 'appointment_users');
    }

    public function is_admin()
    {

        if (Auth::check()) {

            $user = Auth::user();

            if ($user->role == 'A') {

                return true;

            }

            return false;

        }

        return false;
    }

    public function is_common()
    {

        if (Auth::check()) {

            $user = Auth::user();

            if ($user->role == 'S' or $user->role == 'A') {

                return true;

            }

            return false;

        }

        return false;
    }
}
