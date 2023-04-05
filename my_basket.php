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
        <a class="dropdown-item" href="generate_outfit.php">Generate an outfit</a>
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
          <h1 class="display-3 mt-5">Basket</h1>
          
        </div>
		</div>
		<div class="container">
        <!-- Example row of columns -->

        </form>
		  <?php
	
				$host = 'denismana.ddns.net';
				$user = 'denis';
				$pass = 'denis123';
				$database = 'basket';
				$new_database='products';
				$email=$_SESSION['email'];
				$total_price=0;
				$conn = new mysqli($host, $user, $pass,$database);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                 }
				 
				 $new_conn = new mysqli($host, $user, $pass,$new_database);
                if ($new_conn->connect_error) {
                die("Connection failed: " . $new_conn->connect_error);
                } 
				
				$sql="select * from baskettable where email='$email'";
				$result=mysqli_query($conn,$sql);
				if($result)
				{
					$count=mysqli_num_rows($result);
					if($count)
					{
						while($row=$result->fetch_assoc())
						{
							$my_id=$row['products'];
							$sql_prod="select * from productstable where id='$my_id'";
							$result_out=mysqli_query($new_conn,$sql_prod);
							if($result_out)
							{
								$cout_out=mysqli_num_rows($result_out);
								if($cout_out)
								{
									while($this_rows=$result_out->fetch_assoc())
									{
										$total_price=$total_price+$this_rows['price'];
										 $s=$this_rows['files'];?> 
							 
							   <div class='div2'><style> .div2 { border-style:groove;}</style><img src="<?php echo $s; ?>" alt="HTML5 Icon" style="width:500px;height:500px">
							  <br>Category:
							  <?php echo $this_rows["name"]; ?> <br>Price: <?php echo $this_rows['price']; ?>
							  <br>Size:<?php echo $this_rows['si_ze']; ?>
							  <br>Description: <?php echo $this_rows['description']; ?> 
							  <br>
							  <a class="btn btn-outline-success my-1 my-sm-1" href="delete_basket.php?id=<?php echo $row['id']; ?>"  type="submit">Delete</a></div><br>
								<?php	}
								}
							}
						}
					}
					else echo "The basket is empty";
				}
				?>
				<p>Your total is: </p> <?php  echo$total_price; ?>
		<?php mysqli_close($conn);
		?>
		</br><p>Done with the shopping?</p>
         <p><a class="btn btn-primary btn-lg" href="order.php" role="button">Order&raquo;</a></p>
		 </br><p>More shopping?</p>
         <p><a class="btn btn-primary btn-lg" href="home.php" role="button">Home&raquo;</a></p>
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