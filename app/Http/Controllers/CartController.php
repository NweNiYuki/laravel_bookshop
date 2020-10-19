<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
    	return view('publicviews.index');
    }

    public function store(Request $request)
    {


        \Cart::add($request->id, $request->title, 1, $request->price)->associate('App\Book');

    	return back();
    }



    public function updateCart()
    {
        Cart::update(request()->id, request()->qty);
        return back();
    }

    public function removeCart($rowId)
    {
    	\Cart::remove($rowId);

    	return back()->with('success', 'Item has been removed');
    }
}

 