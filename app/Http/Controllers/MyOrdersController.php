<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urgent;
use App\Order;
use App\DeliveryType;
use App\Store;
use App\Product;
use App\OrderDesign;
use App\OrderDesignProduct;
use App\OrderDeliveryArea;
use App\OrderDesignUserImage;
use App\DesignFacePrice;
use Auth;
use Illuminate\Support\Facades\Storage;
use Validator, Input, Redirect; 
use App\Http\Requests\UploadRequest;

class MyOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders->where('active', false);
        $face_price = DesignFacePrice::first();
        $urgents = Urgent::all();

        return view('my_orders.index', [
            'orders' => $orders,
            'face_price' => $face_price,
            'urgents' => $urgents
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $face_price = DesignFacePrice::first();
        //////////////////////////
        ///////Total Calc////////
        ////////////////////////

        // Order SubTotal
        $order_subtotal = 0;
        foreach($order->order_designs as $order_design){
            $order_design_faces_price = ($order_design->faces-1) * ($face_price->price);
            
            foreach($order_design->order_design_products as $order_design_product){
                $size_total = ($order_design_product->product->price * $order_design_product->quantity);
                
                $order_subtotal += $size_total;
            }
            $order_subtotal += $order_design_faces_price;
        }

        // Delivery Fee
        if(isset($order->delivery_area->price)){
            $delivery_fee = $order->delivery_area->price;
        }else{
            $delivery_fee = 0;
        }

        // Urgent Fee
        if(isset($order->urgent->price)){
            $urgent_fee = $order->urgent->price;
        }else{
            $urgent_fee = 0;
        }

        return view('my_orders.show', [
            'order' => $order,
            'order_subtotal' => $order_subtotal,
            'delivery_fee' => $delivery_fee,
            'urgent_fee' => $urgent_fee,
            'face_price' => $face_price
    ]);
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
