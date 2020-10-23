<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    
</head>
<body>
   
   <style>
   	ul.menu {
   		list-style: none;
   		margin: 0;
   		padding: 0;
   		overflow: hidden;
   		
   	}

   	ul.menu li {
   		float: left;
   		border-right: 1px solid #1ABC9C;
   		display: block;
   	}

   	/*ul.menu a {
   		display: block;
   		padding: 10px 10px;
   		text-decoration: none;
   		color: #fff;
   	}
*/
   	ul.menu a:hover {
   		background: #1ABC9C;
   	}

    div.a {
  text-align: right;
} 

   	
   </style>

    @yield("content")
</body>
</html>