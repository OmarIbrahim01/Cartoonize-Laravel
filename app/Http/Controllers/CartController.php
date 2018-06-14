<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urgent;
use App\DeliveryType;
use App\Store;
use App\Product;
use App\OrderDesignProduct;
use App\OrderDeliveryArea;
use Auth;

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



    public function delete_user_image(Request $request)
    {
        return $request->all();
    }













    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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

        return view('cart.show', [
            'urgents' => $urgents, 
            'delivery_types' => $delivery_types, 
            'delivery_areas' => $delievery_areas,
            'cart' => $cart,
            'order_designs' => $order_designs,
            'products' => $products
        ]);
    }

    public function preferences()
    {
        $urgents = Urgent::all();
        $delivery_types = DeliveryType::all();
        $stores = Store::all();
        $delievery_areas = OrderDeliveryArea::all();
        return view('cart.preferences', ['urgents' => $urgents, 'delivery_types' => $delivery_types, 'delivery_areas' => $delievery_areas, 'stores' => $stores]);
    }

    public function review()
    {
        return view('cart.review');
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
