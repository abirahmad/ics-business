<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order_master;
use App\Models\Product;

class DashboardController extends Controller
{
	//Dashboard page load
	public function getDashboardData()
	{
		$seller_id = Auth::user()->id;

		$products = Product::where('user_id', '=', $seller_id)->count();

		return view('seller.dashboard', compact('products'));
	}
}
