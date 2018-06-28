<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function design()
    {
    	return $this->belongsTo('App\Design');
    }
}
