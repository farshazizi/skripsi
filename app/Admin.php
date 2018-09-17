<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    // use LaratrustUserTrait;
    use Notifiable;

    // public function role () {
    //     return $this->belongsToMany(role::class, 'role_user'); 
    // }
    protected $guard = 'admin';

    // public function role () {
    //     return $this->belongsToMany(role::class, 'role_user'); 
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
