<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $timestamps = false;
     protected $fillable = [
       'product_name' , 'product_detail',
    ];

 public function item()
 {
 	return $this->hasOne('App\Item');
 }


}
