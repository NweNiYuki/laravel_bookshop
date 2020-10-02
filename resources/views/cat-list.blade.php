@extends('layout')

@section("content")

 <div class="container">
					<h2>Category List</h2>

					@if(session("message"))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
  						{{session("message")}}
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
					</div>
					@endif

				<a href="/category/create"><button class="btn btn-success">Create Category</button></a>

				@foreach($data as $category)

					<form method="post" action="/category/{{$category->id}}">

					@csrf
					@method("DELETE")

				
					<a href="/category/{{ $category->id }}">
					<li>Name-{{$category->name }}<br>
						Remark-{{$category->remark}}
					</a>

					
					<button class="btn btn-info">Delete</button>

					<a href="/category/{{$category->id}}/edit" class="btn btn-info">Edit</a>
				    </li>

		
					<hr>
				
					</form>
				@endforeach
				

</div>

@endsection