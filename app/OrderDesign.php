<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDesign extends Model
{
	public function design()
    {
    	return $this->belongsTo('App\Design');
    }

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function order_design_products()
    {
    	return $this->hasMany('App\OrderDesignProduct');
    }

    public function user_images()
    {
    	return $this->hasMany('App\OrderDesignUserImage');
    }
}
