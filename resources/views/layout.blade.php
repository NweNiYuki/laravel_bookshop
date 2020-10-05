<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
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

   	
   </style>

    @yield("content")
</body>
</html>