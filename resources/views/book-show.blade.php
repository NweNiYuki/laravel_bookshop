@extends('layout')

@section('content')

<div class="container">
	 	<b>Title-{{$book->title }}</b>
						<i>Author-{{$book->author}}</i>
						<small>(in Category-{{$book->categories->name}}</small>
						<span> $ Price-{{$book->price}}</span>
						<div>Summary-{{$book->summary}}</div>

</div>

@endsection