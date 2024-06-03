<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order_master;
use App\Models\Product;

class DashboardController extends Controller
{
    //Dashboard page load
    public function getDashboardData(){
		$lan = glan();
		
		$total_order = Product::count();
		$pending_order = 4;
		
        return view('backend.dashboard', compact('total_order', 'pending_order'));
    }
}
