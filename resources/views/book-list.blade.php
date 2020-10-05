@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
            <div class="card">
                <div class="card-header"><b>BOOK LIST</b>
                	 <ul class="menu">
                        <li><a href="/book">Manage Books</li>
                        <li><a href="/category">Manage Categories</a></li>
                        <li>Manage Orders</li>

                        
                    </ul>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="container">

                    @if(session("message"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session("message")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    @endif

        <a href="/book/create"><button class="btn btn-success">New Book</button></a><br><br>
                {{$data->links()}}
                
                <ul class="books">

                @foreach($data as $book)

                    <form method="post" action="/book/{{$book->id}}">

                    @csrf
                    @method("DELETE")
                
                    <li>
                        <img src="{{'/images/'.$book->cover}}" alt="" align="right"  height="140"></li>
                        <b>Title-{{$book->title }}</b>
                        <i>Author-{{$book->author}}</i>
                        <small>(in Category-{{$book->categories->name}}</small>
                        <span> $ Price-{{$book->price}}</span>
                        <div>Summary-{{$book->summary}}</div>
                        

                    </li>

                    <button class="btn btn-info">Delete</button>
                    <a href="/book/{{$book->id}}/edit" class="btn btn-info">Edit</a>
                    <hr>
                    
                    </form>

                @endforeach

                </ul>

</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
