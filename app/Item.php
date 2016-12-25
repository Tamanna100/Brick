<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $table = 'items';
	public $timestamps = false;
    public function productOrders()
    {
    	return $this->belongsToMany('App\ProductOrder');
    }


    public function product()
    {
    	return $this->belongsTo('App\Item');
    }

}
