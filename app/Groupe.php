<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
    	'name', 'nrb_user'
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function sousGroupes()
    {
    	return $this->hasMany('App\SousGroupe');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword');
    }

    public function abonnement()
    {
        return $this->hasOne('App\Abonnement');
    }
}
