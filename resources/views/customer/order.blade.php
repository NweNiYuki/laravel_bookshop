@extends('layout')

@section('content')

<h1>Customer Order List</h1>

<div class="a"><a href="/book"><button class="btn btn-primary" style="text-align: right">Back To Home</button></a></div>


<div class="box-body">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	@foreach ($orders as $key=> $order)
    <tr>
      <th scope="row">{{ $order->id}}</th>
      <td>{{$order->name}}</td>
      <td>{{$order->email}}</td>
      <td>{{$order->address}}</td>
      <td>{{$order->phone}}</td>
      <td>
  
      	<button class="btn btn-primary btn-xs accordian-toggle" data-toggle="collapse" data-target="#demo{{$key}}">
      		<span class="glyphicon glyphicon-eye-open	"></span>
      		
      	</button>

      </td>
    </tr>

    <tr class="accordian-body collapse" id="demo{{$key}}">
    	<td>

    	<table class="table table-hover">

    		<thead>
    			<tr>
    				<th scope="col">Order(Book)</th>
    				<th scope="col">Qty</th>
    				<th scope="col">Price</th> 
    				<th scope="col">Total Amount</th>
    			</tr>
    		</thead>

    		<tbody>

    			@foreach ($order->orderItem as $item)

    			<tr>
    				<td>{{ $item->book->title }} </td>
    				<td>{{ $item->qty }} </td>
    				<td>${{ $item->price }} </td>
    				<td>${{ $item->amount }} </td>
    			</tr>

    			@endforeach

    		</tbody>
    		

    	</table>
    	
	</td>

    </tr>


   @endforeach
</tbody>
</table>

</div>



@endsection