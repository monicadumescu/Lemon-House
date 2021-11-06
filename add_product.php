<?php
   include('session.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lemon House</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/custom_theme.css">

  </head>

  <body>

   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
     <a class="navbar-brand" href="home_admin.php">
          <img src="logo.svg" widh="100%" height="40"/>
      </a>
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="home_admin.php">Home</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="coments_admin.php">Comments</a>
          </li>

          <li class="nav-item">
            <button class="nav-link dropdown-toggle bg-transparent btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="logout.php">Logout</a>
			  <a class="dropdown-item" href="add_product.php">Add a product</a>
              <a class="dropdown-item" href="my_basket_admin.php">My basket</a>
              <a class="dropdown-item" href="order_admin.php">Finish and order</a>
			  <a class="dropdown-item" href="previous_orders_admin.php">Previous orders</a>
			  <a class="dropdown-item" href="change_pass_admin.php">Change password</a>
            </div>
          </li>
		  		<li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
          </li>
        </ul>
       
      </div>
    </nav>

    <div role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          <h1 class="display-3 mt-5">Add a product</h1>
      
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        
          <div class="col-sm-12 col-lg-6 mt-3">
            <form action="add_product.php" method="get" enctype="multipart/form-data">
			<label for="product">Product name: </label>
          <input class="form-control mr-sm-1" type="text" placeholder="product name" aria-label="name" name="name" required="required"> 
		  </br><label for="price">Price: </label></br>
		  <input class="form-control mr-sm-2" type="text" placeholder="price" aria-label="price"  name="price" required="required">
		   </br><label for="in_stock">In stock: </label></br>
		  <input class="form-control mr-sm-2" type="text" placeholder="in_stock" aria-label="in_stock"  name="in_stock" required="required">
		  </br><label for="sizes">Sizes: </label></br>
		  <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size1">XS</label><br>
           <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size1">S</label><br>
		  <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size3">M</label><br>
		  <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size4">L</label><br>
		  <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size5">XL</label><br>
		  <input type="radio" id="sizes" name="sizes" value="sizes">
          <label for="size6">XXL</label><br>
		  </br><label for="description">Description: </label></br>
		  <input class="form-control mr-sm-3" type="text" placeholder="description" aria-label="description"  name="description" required="required"></br>
		  <label for="picture">Picture: </label></br>
		  <input class="form-control mr-sm-3" type="file" placeholder="picture" aria-label="picture"  name="picture" required="required"></br>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Save</button></br>
		  
        </form>
<?php

		if(!empty($_GET))
			{
				
				$name=$_GET['name'];
				$price=$_GET['price'];
				$in_stock=$_GET['in_stock'];
				$sizes=$_GET['sizes'];
				$description=$_GET['description'];
				$picture=$_GET['picture'];
					
				$host = 'localhost';
				$user = 'root';
				$pass = '';
			    $database = 'products';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   
				   $sql = "INSERT INTO ProductsTable (name, price, si_ze, in_stock, description,files) VALUES ('$name', '$price', '$in_stock', '$sizes', '$description', '$picture')";
				   if ($conn->query($sql) === TRUE) {
                         echo "Thank you for adding a product :)";
                        } else {
                               echo "Error: " . $sql . "<br>" . $conn->error;
                                }
			}
			mysqli_close($conn);
		?>
         
        </div>

      </div> <!-- /container -->

    </div>

    <footer class="container mt-5">
      <p>&copy; Company 2020-2021</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      $('.navbar-toggler').on("click", function() {
        $('.navbar-collapse').toggle('slow').addClass('opened');
      })
    </script>
  </body>
</html>
