<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cin', 'name', 'email', 'password','tel', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groupe()
    {
        $this->belongsTo('App\Groupe');
    }

    public function sousGroupe()
    {
        $this->belongsTo('App\SousGroupe');
    }

    public function roles()
    {
        $this->belongsToMany('App\Role');
    }
}
