@extends('layout')

@section("content")

 <div class="container">
					<h2>Book List</h2>
					

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

@endsection