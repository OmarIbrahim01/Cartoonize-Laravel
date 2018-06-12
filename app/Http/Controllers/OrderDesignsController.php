<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDesign;

class OrderDesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasActiveCart()){
            $cart = Auth::user()->activeCart();
        }elseif(!Auth::user()->hasActiveCart()){
            $cart = new Order;
            $cart->user_id = Auth::id();
            $cart->delivery_type_id = null;
            $cart->delivery_address = null;
            $cart->delivery_area_id = null;
            $cart->store_id = null;
            $cart->urgent_id = null;
            $cart->order_progress_id = 1;
            $cart->active = true;
            $cart->save();
        }

        $order_design = new OrderDesign;
        $order_design->order_id = $cart->id;
        $order_design->design_id = $request->design;
        $order_design->note = $request->comment;
        $order_design->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
