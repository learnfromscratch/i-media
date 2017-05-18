<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeKeyword extends Model
{
    protected $fillable = [
    	'keyword_id', 'groupe_id'
    ];
}
