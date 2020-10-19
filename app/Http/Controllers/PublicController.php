<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
    	$books =  Book::orderBy('id','desc')->paginate(6);
    	return view('publicviews.public_welcome', compact('books'));
    }

    public function show($id)
    {
    	$book = Book::find($id);
    	return view('publicviews.book-detail', compact('book'));
    }
}
