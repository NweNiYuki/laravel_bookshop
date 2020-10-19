<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Cart;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::content();
        return view("publicviews.checkout", compact('carts'));
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

        $validatedData = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric|digits_between:9,11',
        'address' => 'required', 
        'city' => 'required',
        
        ]);

        $order = Order::create($validatedData);

        // $order = new Order();
        // $order->name = $request->name;
        // $order->email = $request->email;
        // $order->phone = $request->phone;
        // $order->address = $request->address;
        // $order->city = $request->city;

        // $order->save();

        if($order->save()) {

            foreach (Cart::content() as $key => $cart) {
                
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->book_id  = $cart->id;
                $item->price = $cart->price;
                $item->qty   = $cart->qty;
                $item->amount= $cart->total;

                $item->save();

            }

        }

        $request->session()->forget('cart');

       return redirect('/thank');
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
