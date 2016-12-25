<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
	public $timestamps = false;
    public function department()
    {
    	return $this->belongsTo('App\Department');
    }

    public function job()
    {
    	return $this->belongsTo('App\Job');
    }


    
}
