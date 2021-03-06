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

class CartController extends Controller
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
        //
    }

    public function add_product_to_cart(Request $request, $order_design_id)
    {
        $order_design_product = new OrderDesignProduct;
        $order_design_product->order_design_id = $order_design_id;
        $order_design_product->product_id = $request->product;
        $order_design_product->quantity = $request->quantity;
        $order_design_product->save();
        return redirect()->route('shopping_cart.show');
    }


    public function remove_product_from_cart($id)
    {
        $product = OrderDesignProduct::findOrFail($id);
        $product->delete();
        return redirect()->route('shopping_cart.show');



    }



    public function add_user_images_to_order_design(Request $request, $order_design_id)
    {
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
    }



    public function add_user_image(Request $request)
    {
        //Upload Images And Add to OrderDesignsUserImages
        foreach($request->file('user_image') as $image){
            $image_name = date("d-m-Y")
                        .'_'
                        .$image->getClientOriginalName();

            $image_location = Storage::url('public/orders/'.$request->order_id.'/'.$image_name);

            Storage::putFileAs('public/orders/'.$request->order_id, $image, $image_name);

            $image = new OrderDesignUserImage;
            $image->order_design_id = $request->order_design_id;
            $image->name = $image_name;
            $image->full_path = $image_location;
            $image->save();

        }
        return redirect()->route('shopping_cart.show');
    }

    public function delete_user_image($id)
    {
        $image = OrderDesignUserImage::findOrFail($id);
        $image->delete();
        return redirect()->route('shopping_cart.show');
    }

    public function delete_cart()
    {
        $order = Auth::user()->activeCart();
        foreach($order->order_designs as $order_design){

            foreach($order_design->order_design_products as $order_design_product){
                $order_design_product->delete();
            }
            foreach($order_design->user_images as $user_image){
                $user_image->delete();
            }

            $order_design->delete();
        }
        
        return redirect()->route('shopping_cart.show');
    }


    //////////////////////////////////////
    /////////////Submit Cart/////////////
    ////////////////////////////////////

    public function submit_first(Request $request)
    {
        

        foreach($request->order_design_id as $key => $order_design_id){
            $comment = $request->comment[$key];
            $order_design = OrderDesign::findOrFail($order_design_id);
            $order_design->note = $comment;
            $order_design->save();
        }

        return redirect()->route('shopping_cart.preferences');
    }

    public function submit_second(Request $request)
    {
        $urgent = $request->urgent_id;
        $delivery_type = $request->delivery_type_id;
        $delivery_area = $request->delivery_area_id;
        $shipping_address = $request->shipping_address;
        $store_id = $request->store_id;
        // dd($urgent, $delivery_type, $delivery_area, $shipping_address, $store_id);

        $order = Auth::user()->activeCart();
        $order->urgent_id = $urgent;
        $order->delivery_type_id = $delivery_type;

        if($delivery_type == 1){
            $order->delivery_area_id = $delivery_area;
            $order->delivery_address = $shipping_address;
            $order->store_id = null;
            $order->save();
        }elseif($delivery_type == 2){
            $order->store_id = $store_id;
            $order->delivery_area_id = null;
            $order->delivery_address = null;
            $order->save();
        }

        return redirect()->route('shopping_cart.review');
    }


    public function submit_third(Request $request)
    {
        

        $order = Auth::user()->activeCart();
        $order->order_progress_id = 10;
        $order->active = false;
        $order->save();

        return redirect()->route('designs.index');
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(!Auth::user()->hasActiveCart()){
            $cart = new Order;
            $cart->user_id = Auth::id();
            $cart->active = true;
            $cart->order_progress_id = 1;
            $cart->save();
        }

        $face_price = DesignFacePrice::first();
        $urgents = Urgent::all();
        $delivery_types = DeliveryType::all();
        $stores = Store::all();
        $delievery_areas = OrderDeliveryArea::all();
        $products = Product::all();

        if(Auth::user()->hasActiveCart()){
            $cart = Auth::user()->activeCart();
            $order_designs = $cart->order_designs;
        }else{
            $cart = null;
            $order_designs = null;
        }

        //////////////////////////
        ///////Total Calc////////
        ////////////////////////

        // Order SubTotal
        $order_subtotal = 0;
        foreach($cart->order_designs as $order_design){
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

       

        return view('cart.show', [
            'urgents' => $urgents, 
            'delivery_types' => $delivery_types, 
            'delivery_areas' => $delievery_areas,
            'cart' => $cart,
            'order_designs' => $order_designs,
            'products' => $products,

            'order_subtotal' => $order_subtotal,
            'delivery_fee' => $delivery_fee,
            'urgent_fee' => $urgent_fee
        ]);

    }

    public function preferences()
    {
        $order = Auth::user()->activeCart();
        $face_price = DesignFacePrice::first();
        $urgents = Urgent::all();
        $delivery_types = DeliveryType::all();
        $stores = Store::all();
        $delievery_areas = OrderDeliveryArea::all();

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

       
        return view('cart.preferences', ['urgents' => $urgents,
                                         'delivery_types' => $delivery_types, 
                                         'delivery_areas' => $delievery_areas, 
                                         'stores' => $stores,
                                         'order_subtotal' => $order_subtotal,
                                         'delivery_fee' => $delivery_fee,
                                         'urgent_fee' => $urgent_fee
                                     ]);
    }

    public function review()
    {
        $order = Auth::user()->activeCart();
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

        return view('cart.review', [
                'order' => $order, 
                'face_price' => $face_price,

                'order_subtotal' => $order_subtotal,
                'delivery_fee' => $delivery_fee,
                'urgent_fee' => $urgent_fee
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
