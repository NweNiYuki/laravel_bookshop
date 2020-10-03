@extends('layout')

@section("content")

	<div class="container">
			<h1>New Book</h1>
			
					

		<form action="/book" method="post">
			@csrf
		<div class="form-group">
		<label for="title">Book title</label>
		<input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
		</div>

		<div class="form-group">
		<label for="author">Book Author</label>
		<input type="text" name="author" id="author" class="form-control" value="{{old('author')}}">
		</div>

		<div class="form-group">
		<label for="summary">Summary</label>
		<textarea name="summary" id="summary" class="form-control" value="{{old('summary')}}"></textarea> 
		</div>

		<div class="form-group">
		<label for="Price">Book Price</label>
		<input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
		</div>

		 <!-- <div class="form-group">
        	<label for="category_id">Category</label>
          <input type="text" name="category_id" class="form-control" id="category_id" value="{{old('category_id')}}" >
        </div> -->
         <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="form-control">
            @foreach ($category as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
          </select>
        </div>

		 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	

@endsection

