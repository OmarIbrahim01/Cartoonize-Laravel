<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDesign;
use App\OrderDesignProduct;
use App\OrderDesignUserImage;


use Illuminate\Support\Facades\Storage;
use Validator, Input, Redirect; 
use App\Http\Requests\UploadRequest;

use Auth;

class OrderDesignsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request, $design_id)
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

        //Add Design To OrderDesigns
        $order_design = new OrderDesign;
        $order_design->order_id = $cart->id;
        $order_design->design_id = $design_id;
        $order_design->faces = $request->faces;
        $order_design->note = $request->comment;
        $order_design->save();

        //Add Sizes To OrderDesignProducts
        $size = new OrderDesignProduct;
        $size->order_design_id = $order_design->id;
        $size->product_id = $request->size;
        $size->quantity = $request->quantity;
        $size->save();

        //Upload Images And Add to OrderDesignsUserImages
        foreach($request->file('user_image') as $image){
            $image_name = date("d-m-Y")
                        .'_'
                        .$image->getClientOriginalName();

            $image_location = Storage::url('public/orders/'.$cart->id.'/'.$image_name);

            Storage::putFileAs('public/orders/'.$cart->id, $image, $image_name);

            $image = new OrderDesignUserImage;
            $image->order_design_id = $order_design->id;
            $image->name = $image_name;
            $image->full_path = $image_location;
            $image->save();

        }

        return redirect()->route('shopping_cart.show');
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
