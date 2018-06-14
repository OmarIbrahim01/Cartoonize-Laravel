<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDesignUserImage extends Model
{
    public function design()
    {
    	return $this->belongsTo('App\OrderDesign');
    }
}
