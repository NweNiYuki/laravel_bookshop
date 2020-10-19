@extends('publicviews.layout')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Online Book Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         
          <a href="{{url('cart')}}"><button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>Books in your Cart 
                    
                     <span class="badge badge-light">
                       {{ Cart::instance('default')->count() }}
                     </span>
                   
                </button>
           </a>
        </ul>
       
        <div class="row">
           <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
          <a href="{{ url('cart') }}" class="btn btn-info btn-block">View all</a>
        </div>

      </div>
    </div>
  </nav>
<div class="container">
    <h1>Cart</h1>

    @if (session()->has('success'))

    <div class="alert alert-success">

         {{session()->get('success')}}

    </div>
   
    @endif

   
    @if(Cart::count() > 0)
    
     <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Book name</th>
                            <th scope="col">Author</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach (Cart::content() as $item)
                        <tr>
                            <td><img src="{{'/images/'. $item->model->cover}}" width="100" height="100" /> </td>
                            <td>{{ $item->model->title}}</td>
                            <td>{{ $item->model->author}}</td>
                                
        <td>

        <form action="{{ route('cart.update')}}" method="post" id="frm_update{{ $item->rowId }}">
            @csrf
                            
        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
            <select class="form-control" name="qty" 
            onchange="document.getElementById('frm_update{{ $item->rowId}}'.submit();" style="border-radius: none; border: none; background: transparent; font-weight: bold;"> 
             @for($i =1; $i<=100; $i++)
            <option value="{{ $i }}" {{ $i== $item->qty ? 'selected' : null }}>{{ $i }}</option>
             @endfor
                            
            </select>
        </form>
        
        </td>
                            

        <td class="text-right">{{ $item->subtotal }}</td> 

                             
        <td class="text-right"><a href="{{ route('cart.remove',$item->rowId)}}"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button></a> </td>
                            
                           
        </tr>
        
        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>SubTotal</td>
                            <td class="text-right">${{ Cart::subtotal()}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tax10%</td>
                            <td class="text-right">${{ Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>${{ Cart::total() }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="/"><button class="btn btn-block btn-success">Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="/checkout"><button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button></a>
                </div>
            </div>

        @else

        <h3>No items in Cart!</h3>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="/"><button class="btn btn-block btn-light">Continue Shopping</button></a>
                </div>

        </div>
        @endif
        
</div>
@endsection