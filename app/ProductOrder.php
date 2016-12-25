<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
     
public $timestamps = false;
     protected $table = 'orders';

         public function items()
    {
        return $this->belongsToMany('App\Item');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
