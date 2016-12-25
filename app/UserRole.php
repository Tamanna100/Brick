<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	public $timestamps = false;
    public funtion users()
    {
    	$this->belongsToMany('App\User');
    }
}
