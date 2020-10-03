@extends('layout')

@section("content")

	<div class="container">
			<h1>Edit Book</h1>
			
				@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif	

		<form action="/book/{{ $book->id }}" method="post" enctype="multipart/form-data">
			@csrf
			@method("PATCH")
		<div class="form-group">
		<label for="title">Book title</label>
		<input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
		</div>

		<div class="form-group">
		<label for="author">Book Author</label>
		<input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
		</div>

		<div class="form-group">
		<label for="summary">Summary</label>
		<textarea name="summary" id="summary" class="form-control">{{ $book->summary }}</textarea> 
		</div>

		<div class="form-group">
		<label for="Price">Book Price</label>
		<input type="text" name="price" id="price" class="form-control" value="{{ $book->price }}">
		</div>

		 <!-- <div class="form-group">
        	<label for="category_id">Category</label>
          <input type="text" name="category_id" class="form-control" id="category_id" value="{{old('category_id')}}" >
        </div> -->
         <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="form-control">
            @foreach ($category as $value)
            <option value="{{$value->id}}"
            {{ $book->categories->id == $value->id ? "selected" : "" }}
            >{{$value->name}}</option>
            @endforeach
          </select>
        </div>

         <div class="form-group">
          <label>Image</label>
          <input type="file" name="rimage"><br><br>
           <img src="{{'/images/'.$book->cover}}" width="100" height="100"></li>
        </div>


		 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>

	

@endsection

