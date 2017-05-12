<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousGroupe extends Model
{
    protected $fillable = [
    	'name', 'groupe_id'
    ];

    public function groupe()
    {
    	$this->belongsTo('App\Groupe');
    }

    public function users()
    {
    	$this->hasMany('App\User');
    }
}
