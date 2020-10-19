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
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
        </ul>
       
        <div class="row">
           <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
          <a href="{{ url('cart') }}" class="btn btn-info btn-block">View all</a>
        </div>

      </div>
    </div>
  </nav>

   
  <div class="container">
    <div class="container wow fadeIn"> <!-- Heading -->
      <h2 class="">Checkout Form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">
          
          <form action="{{ url('checkout') }}" method="post">
             @csrf
          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="address" class="form-control" placeholder="1234 Main St">
                <label for="address" class="">Address</label>
              </div>

              <!--address-2-->
              <div class="md-form mb-5">
                <input type="text" id="phone" class="form-control" placeholder="Enter your phone number">
                <label for="address-2" class="">Phone</label>
              </div>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option>Myanmar</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Choose...</option>
                    <option>Yangon</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="zip">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <div class="d-block my-3">
                
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Cash on Delivery</label>
                </div>
              </div>
              
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Order</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your Order</span>
            <span class="badge badge-secondary badge-pill">
            	{{ Cart::instance('default')->count() }}</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
          	@foreach (Cart::content() as $item)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
              	<img src="{{'/images/'. $item->model->cover}}" width="100" height="100" />
                <h6 class="my-0">Name&raquo;{{ $item->model->title }}</h6>
                <small class="text-muted">by&raquo; {{ $item->model->author }}</small><br>
                <small class="text-muted">qty&raquo; {{ $item->qty }}</small><br>
                <small class="text-muted">price&raquo; ${{ $item->model->price }}</small>

              </div>

            </li>
            @endforeach
           
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
          
          <!-- Cart -->

          <!-- Promo code -->
         
           <a href="/"><button class="btn btn-block btn-success">Continue Shopping</button></a>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>

 </div>

@endsection
