<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{

	public $timestamps = false;
    public function location()
    {
    	return $this->belongsTo('App\Location');
    }
}
