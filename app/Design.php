<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function subCategory()
    {
    	return $this->belongsTo('App\SubCategory');
    }
}
