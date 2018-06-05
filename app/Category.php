<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCategory()
    {
    	return $this->hasMany('App\SubCategory');
    }

    public function designs()
    {
    	return $this->hasMany('App\Design');
    }
}
