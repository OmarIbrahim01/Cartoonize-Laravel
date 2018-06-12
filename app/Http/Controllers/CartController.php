<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urgent;
use App\DeliveryType;
use App\Store;
use App\OrderDeliveryArea;

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
        return view('cart.show', ['urgents' => $urgents, 'delivery_types' => $delivery_types, 'delivery_areas' => $delievery_areas]);
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
