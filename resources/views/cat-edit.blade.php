@extends('layout')

@section("content")

	<div class="container">
			<h1>Edit Category</h1>

			
					@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<form action="/category/{{ $category->id }}" method="post">
		@csrf
		@method("PATCH")

	<div class="form-group">
	<label for="name">Category Name</label>
	<input type="text" name="name" class="form-control" value="{{ $category->name }}">
	</div>

	<div class="form-group">
	<label for="remark">Ingredients</label>
	<textarea name="remark" class="form-control">{{ $category->remark}}</textarea>
	</div>

		 <button type="submit" class="btn btn-primary">Update</button>
	</form>
	</div>
	

@endsection

