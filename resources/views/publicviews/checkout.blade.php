@extends('publicviews.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checkout Payment</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	<script src="https://js.stripe.com/v3/"></script>

	<style type="text/css">
		
		html,body {
			width: 890px;
			margin: 0 auto;
		}
	</style>

	
</head>
<body>

	<h1>Billing Details</h1>
	
	<hr>
	@if ($errors->any())
	    			<div class="alert alert-danger">
	       				 <ul>
	           				 @foreach ($errors->all() as $error)
	                			<li>{{ $error }}</li>
	            			 @endforeach
	       				 </ul>
	    			</div>
	@endif

		<div class="container" style="margin-top: 5px;">

			<div class="row">
				
				<div class="col-lg-8 col-md-8 col-sm-8">

					<form action="{{route('checkout.store')}}" method="post" id="payment-form">
						@csrf

					<div class="form-group">
						
						<input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
					</div>

					<div class="form-group">
						
						<input type="text" name="phone" class="form-control" placeholder="779281223" value="{{old('phone')}}"  minlength="9" maxlength="11">
					</div>

					<div class="form-group">
						
						<input type="text" name="email" id="email" class="form-control" placeholder="youremail@example.com" value="{{old('email')}}">
					</div>

					<div class="form-group">
						
						<input type="text" name="address" class="form-control" placeholder="Your Address" value="{{old('address')}}">
					</div>

					<div class="form-group">
						
						<input type="text" name="city" class="form-control" placeholder="Your City" value="{{old('city')}}">
					</div>

					
					<div class="form-group">
						
						<button class="btn btn-success btn-block">Complete Ordered</button>
					</div>

					
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4">

					<div class="form-group">
						
						<ul class="list-group">
							
							<li class="list-group-item d-flex justify-content-between">
                            <span>SubTotal (USD)</span>
                            <strong>${{ Cart::subtotal() }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
				              <span>Tax(10%)</span>
				              <strong>${{ Cart::tax() }}</strong>
				              </li>
				              <li class="list-group-item d-flex justify-content-between">
				              <span>Total (USD)</span>
				              <strong>${{ Cart::total() }}</strong>
				              </li>
						</ul>

						
					</div>
					<div class="">
                    <a href="/"  class="btn btn-block btn-success">Go Back Home</a>
        			</div>
						
				</div>
			</div>
			
		</div>
		
		
</body>

</html>


@endsection