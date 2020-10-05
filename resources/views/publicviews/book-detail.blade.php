<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Book Shop Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="https://startbootstrap.github.io/startbootstrap-shop-homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://startbootstrap.github.io/startbootstrap-shop-homepage/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Online Book Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

   
      <!-- /.col-lg-3 -->
        <div class="row">

          <div class="col-md-12">
            <div class="card h-100">

               @if($book->cover)
              <img class="card-img-top" src="{{'/images/'. $book->cover}}" width="300" height="200">
              @endif
              
              <div class="card-body">
                  <h3>{{$book->title}}</h3>
                  <i>by {{$book->author}}</i>
                  <b>price -${{$book->price}}</b>
                  <p>{{$book->summary}}</p>
               
              </div>
              <div class="card-footer">
                <a href="#" class="text-muted">Add to Cart&#9733; &#9734; </a>
                <a href="/"><button type="button" class="btn btn-sm btn-outline-secondary">Back</button></a>
              
              </div>
            </div>
          </div>

        
        </div>
        <!-- /.row -->

      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
