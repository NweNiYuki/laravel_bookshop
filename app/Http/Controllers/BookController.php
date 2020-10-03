<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data = Book::paginate(4);
       return view('book-list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category = Category::all();
        return view('book-create', compact('category'));
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
        'title' => 'required',
        'author' => 'required',
        'category_id' => 'required',
        'summary' => 'required',
        'price' => 'required',
        'rimage' => 'required|image',
        ]);

        //   $book = new Book();

        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->category_id = $request->category_id;
        // $book->summary = $request->summary;
        // $book->price = $request->price;

        // $book->save();

       //image upload
        $imageName =time().".".request()->rimage->getClientOriginalExtension();
        // dd($imageName);
        
        request()->rimage->move(public_path('images'), $imageName);
       

        $book= Book::create($validatedData + ['cover'=> $imageName] );  

        session()->flash('message', 'Category has created successfully');

        return redirect('book');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // dd($book->categories->name);
        return view('book-show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $category = Category::all();
        return view('book-edit', compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

       $validateData = request()->validate([
        'title' => 'required',
        'author' => 'required',
        'category_id' => 'required',
        'summary' => 'required',
        'price' => 'required',
        ]);

       // $category = Category::find($category->id);

       //  $book->title = request()->title;
       //  $book->author = request()->author;
       //  $book->category_id = request()->category_id;
       //  $book->summary = request()->summary;
       //  $book->price = request()->price;

       //  $book->save();
       if(request()->rimage){
        $imageName =time().".".request()->rimage->getClientOriginalExtension();
        request()->rimage->move(public_path('images'), $imageName);
        }
          


        if(!empty($imageName)){

        $book->update($validateData + ['cover'=>$imageName]);
        }else {
            $book->update($validateData);
        }

        return redirect('book')->with('message', 'Receipe has updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('book')->with('message', 'Receipe has deleted successfully');
    }
}
