@extends('layout')

@section("content")

	<div class="container">
			<h1>New Category</h1>
			
					@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<form action="/category" method="post">
			@csrf
		<div class="form-group">
		<label for="name">Category Name</label>
		<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
		</div>

		<div class="form-group">
		<label for="remark">Remark</label>
		<textarea name="remark" id="remark" class="form-control" value="{{old('remark')}}"></textarea> 
		</div>

		 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	

@endsection

