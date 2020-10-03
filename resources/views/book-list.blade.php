@extends('layout')

@section("content")

 <div class="container">
					<h2>Book List</h2>


		<a href="/book/create"><button class="btn btn-success">New Book</button></a><br><br>

				<ul class="books">

				@foreach($data as $book)

					<form method="post" action="/book/{{$book->id}}">

					@csrf
					@method("DELETE")
				
					<li>
						
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