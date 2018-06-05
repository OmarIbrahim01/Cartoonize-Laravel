<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\Category;
use App\SubCategory;
use App\Product;
use App\DesignFacePrice;

class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = 'all';
        $subcat = null;
        $designs = Design::all()->sortByDesc('id');
        return view('designs.index')->withDesigns($designs)->withCat($cat)->withSubcat($subcat);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $subcat = null;
        $designs = Design::where('category_id', $id)->get()->sortByDesc('id');
        return view('designs.index')->withDesigns($designs)->withCat($cat)->withSubcat($subcat);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subCategory($category_id, $sub_category_id)
    {
        $cat = Category::findOrFail($category_id);
        $subcat = SubCategory::findOrFail($sub_category_id);
        $designs = Design::where([
                            ['sub_category_id', '=', $sub_category_id],
                            ['category_id', '=', $category_id],
                        ])->get()->sortByDesc('id');
        return view('designs.index')->withDesigns($designs)->withCat($cat)->withSubcat($subcat);
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
        $design = Design::findOrFail($id);
        $products = Product::All();
        $face_price = DesignFacePrice::where('active', true)->first();
        return view('designs.show', [
                            'design' => $design,
                            'products' => $products,
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
