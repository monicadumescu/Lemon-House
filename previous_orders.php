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
     <a class="navbar-brand" href="home.php">
          <img src="logo.svg" widh="100%" height="40"/>
      </a>
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="home.php">Home</a>
          </li>

          <li class="nav-item">
            <button class="nav-link dropdown-toggle bg-transparent btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="logout.php">Logout</a>
              <a class="dropdown-item" href="my_basket.php">My basket</a>
              <a class="dropdown-item" href="order.php">Finish and order</a>
			  <a class="dropdown-item" href="live_coments.php">Leave a comment</a>
			  <a class="dropdown-item" href="previous_orders.php">Previous orders</a>
			  <a class="dropdown-item" href="change_pass.php">Change password</a>
        <a class="dropdown-item" href="generate_outfit.php">Generate outfit</a>
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
          <h1 class="display-3 mt-5">Previous orders</h1>
          
        </div>
		</div>
		<div class="container">
        <!-- Example row of columns -->

        </form>
		<?php
	
				$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'orders';
				$email=$_SESSION['email'];
				$conn = new mysqli($host, $user, $pass,$database);
				
				$new_database='products';
				$new_conn = new mysqli($host, $user, $pass,$new_database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   if ($new_conn->connect_error) {
                 die("Connection failed: " . $new_conn->connect_error);
                   }
				   $sql_out="select * from OrdersTable where email='$email'" ;
				   $result_out = mysqli_query($conn,$sql_out);
				   $count=mysqli_num_rows($result_out);
				   if($count>0)
				   {
				  if(mysqli_num_rows($result_out))
				  {
					  while($row=mysqli_fetch_assoc($result_out))
					  {
						  $id_prod=$row['products'];
						  $sql_prod="select * from ProductsTable where id='$id_prod'";
						  $result_prod = mysqli_query($new_conn,$sql_prod);
						  if(mysqli_num_rows($result_prod))
				            {
					         while($row_prod=mysqli_fetch_assoc($result_prod))
					          {
							  $s=$row_prod["files"]; ?> 
						    <div class='div2'><style> .div2 { border-style:groove;}</style><img src="<?php echo $s; ?>" alt="HTML5 Icon" style="width:500px;height:500px">
							  <br>Category:
							  <?php echo $row_prod["name"]; ?> <br>Price: <?php echo $row_prod['price']; ?>
							  <br>Size:<?php echo $row_prod['si_ze']; ?>
							  <br>Description: <?php echo $row_prod['description']; ?> 
							 <?php 
							
							?>
							  Price: <?php echo $row["price"]; ?><br>
							  Address: <?php echo $row["address"]; ?><br>
							  Phone number: <?php echo $row["phone_number"]; ?><br></div>
							
							  
							 <?php
							  }
							}
					   }
				  }
				   }

				  else
				  {
					  echo "You have no previous orders";
				  }
				   
		mysqli_close($conn);
		?>
      </div>

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