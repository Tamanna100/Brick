<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakeOrder extends Model
{
    public $timestamps = false;
     protected $table = 'make_orders';


     protected $fillable=[ 'name','quantity','unit_price','total_Price'];

}
