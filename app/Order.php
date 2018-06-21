<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_designs()
    {
    	return $this->hasMany('App\OrderDesign');
    }

    

    public function delivery_area()
    {
    	return $this->belongsTo('App\OrderDeliveryArea');
    }

    public function urgent()
    {
    	return $this->belongsTo('App\Urgent');
    }

}
