<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
    	return view ('publicviews.cart');
    }

    public function addToCart($id)
    
    {
        $book = Book::find($id);

        if(!$book) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "title" => $book->title,
                        "quantity" => 1,
                        "price" => $book->price,
                        "cover" => $book->cover
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Book added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Book added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $book->name,
            "quantity" => 1,
            "price" => $book->price,
            "cover" => $book->cover
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    }

