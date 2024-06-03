<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use App\Models\Pro_category;
use App\Models\Offer_ad;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Tp_option;
use App\Models\Section_manage;

class HomeFrontendController extends Controller
{
	//Get Frontend Data
    public function homePageLoad(Request $request)
	{
		$products1=Product::with('seller','reviews')->orderBy('id','desc')->get()->shuffle();
		$products2=Product::with('seller','reviews')->orderBy('id','desc')->get()->shuffle();
        return view('frontend.home',compact('products1','products2'));
    }
}
