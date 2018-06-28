<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Order;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function hasActiveCart()
    {
        $user_id = Auth::id();
        $cart = Order::where('user_id', $user_id)->where('active', true)->first();

        if(empty($cart)){
            return false;
        }elseif(!empty($cart)){
            return true;
        }

    }

    public function activeCart()
    {
        $user_id = Auth::id();
        $cart = Order::where('user_id', $user_id)->where('active', true)->first();
        if(empty($cart)){
            return false;
        }elseif(!empty($cart)){
            return $cart;
        }
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }

}
