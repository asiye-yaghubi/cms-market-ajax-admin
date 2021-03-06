<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute_Subcategory;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $slider = Slider::where('name','like','%home%')->get();
        $banner = Slider::where('name','like','%banner-1%')->get();
        $banner2 = Slider::where('name','like','banner-2')->get();

        $categorys = Category::get();
        $countsale = Product::orderBy('countsale','desc')->paginate(6);
        $special = Product::where('special','1')->paginate(6);
        $new = Product::orderBy('id','desc')->paginate(6);
        
        $women = Product::where('category_id','1')->paginate(10);
        $men = Product::where('category_id','3')->paginate(10);
        $info = Information::latest()->first();
        $logo = Logo::first();

        $subs = Subcategory::where('category_id',1)->where('parent_id','=',0)->get();
        $submen = Subcategory::where('category_id',3)->where('parent_id','=',0)->get();

        // foreach($submen as $sub){
        //     $subcats = Subcategory::where('parent_id',$sub->id)->get();
        //     foreach($subcats as $subcat){
        //         $att_subs[] = Attribute_Subcategory::where('subcategory_id',$subcat->id)->get();
        //     }
        // }
        // var_dump($att_subs);die;



        return view('site.home',compact('submen','subs','info','logo','slider','categorys','countsale','special','new','banner','banner2','women','men'));
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
