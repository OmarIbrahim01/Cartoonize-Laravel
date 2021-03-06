<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDesignProduct extends Model
{
    public function design()
    {
    	return $this->belongsTo('App\OrderDesign');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
