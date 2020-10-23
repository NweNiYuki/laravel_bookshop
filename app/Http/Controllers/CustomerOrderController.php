<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
     public function order()
    {
    

    	$orders = Order::orderBy('id','desc')->with('orderItem.book')->get();
    	// dump($orders);
    	// exit();
    	return view('customer.order', compact('orders', 'users'));
    }
}
