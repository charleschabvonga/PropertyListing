<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'mobile_number', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first();
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->surname;
    }
}
