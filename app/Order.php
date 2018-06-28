<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_designs()
    {
    	return $this->hasMany('App\OrderDesign');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');
    }	

    public function delivery_area()
    {
    	return $this->belongsTo('App\OrderDeliveryArea');
    }

    public function delivery_type()
    {
    	return $this->belongsTo('App\DeliveryType');
    }

    public function urgent()
    {
    	return $this->belongsTo('App\Urgent');
    }

    public function progress()
    {
    	return $this->belongsTo('App\OrderProgress', 'order_progress_id');
    }



}
