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
			  <a class="dropdown-item" href="live_coments.php">Leave a coment</a>
			  <a class="dropdown-item" href="previous_orders.php">Previous orders</a>
			  <a class="dropdown-item" href="chanhe_pass.php">Change password</a>
            </div>
					<li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
          </li>
          </li>
        </ul>
        
      </div>
    </nav>

    <div role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          <h1 class="display-3 mt-5">Finish and order</h1>
      
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        
          <div class="col-sm-12 col-lg-6 mt-3">
            <form action="order.php" method="get" enctype="multipart/form-data">
			<label for="address">Adress: </label>
          <input class="form-control mr-sm-1" type="text" placeholder="address" aria-label="address" name="address" required="required"> 
		  </br><label for="phone_number">Phone Number: </label></br>
		  <input class="form-control mr-sm-2" type="text" placeholder="phone number" aria-label="phone_number"  name="phone_number" required="required">
		  </br><label for="city">City: </label></br>
		  <input class="form-control mr-sm-3" type="text" placeholder="city" aria-label="city"  name="city" required="required"></br>
		  <label for="state">Country: </label></br>
		  <input class="form-control mr-sm-3" type="text" placeholder="state" aria-label="state"  name="state" required="required"></br>
		  <label for="zip">Zip: </label></br>
		  <input class="form-control mr-sm-3" type="text" placeholder="zip" aria-label="zip"  name="zip" required="required"></br>
         
		  <label for="pay_form">Choose your paymant format: </label></br>
		   <input type="radio" id="cash" name="pay_method" value="cash">
           <label for="html">Cash</label><br>
           <input type="radio" id="carry" name="pay_method" value="carry">
           <label for="css">Carry</label><br>
		   <p>You can only pay after you recieved the order.</p>
          <br><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Order</button></br>
		  
        </form>
<?php
if(!empty($_GET))
			{
				
				$address=$_GET['address'];
				$phone_number=$_GET['phone_number'];
				$city=$_GET['city'];
				$state=$_GET['state'];
				$zip=$_GET['zip'];
				$pay_form=$_GET['pay_method'];
                $email=$_SESSION['email'];				
				
				$host = 'localhost';
				$user = 'root';
				$pass = '';
			    $database = 'orders';
				$new_database='basket';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				 $new_conn = new mysqli($host, $user, $pass,$new_database);
				if ($new_conn->connect_error) {
                 die("Connection failed: " . $new_conn->connect_error);
                   }
			
			$sql_prod="select * from BasketTable where email='$email'";
			$result = mysqli_query($new_conn,$sql_prod);

                 $count = mysqli_num_rows($result);
				
                 if ($count) {
					 while($row=$result->fetch_assoc())
					  {
						  $price=$row['price'];
						  $id_prod=$row['products'];
			   $sql = "INSERT INTO OrdersTable (email, products, price, address, phone_number, city, country, zip, pay_method) VALUES ('$email', '$id_prod', '$price', '$address','$phone_number', '$city', '$state', '$zip', '$pay_form')";
				   if ($conn->query($sql) === TRUE) {
					   $del = mysqli_query($new_conn,"delete from BasketTable where email = '$email'");
                         echo "Thank you for your order :)";
                        } else {
                               echo "Error: " . $sql . "<br>" . $conn->error;
                                }
			}
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
