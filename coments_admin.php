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
      <a class="navbar-brand" href="page.html">
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
		   <li class="nav-item active">
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
			  		<li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
          </li>
            </div>
          </li>
        </ul>
        
      </div>
    </nav>

    <div role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          <h1 class="display-3 mt-5">Comments</h1>
		 
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-sm-12 col-lg-8 mt-3">
             <?php
	
				$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'comments';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   $sql_out="select id, email, comments from CommentsTable";
				   $result_out=mysqli_query($conn,$sql_out);
				   $count = mysqli_num_rows($result_out);
				   
				  if($count >0)
				  {
					  while($row=$result_out->fetch_assoc())
					  {

							  ?> <div class='div1'> <style> .div1 {font-weight: bold;}
						</style> <?php echo $row["email"]; ?> </div><div class='div2'><style> .div2 { border-style:groove;}</style>
						 <?php echo $row["comments"]; ?> 
						</br><a class="btn btn-outline-success my-2 my-sm-1"  href="delete_comments.php?id=<?php echo $row['id']; ?>" type="submit">Delete</a></div></br>
						  
					<?php  }
				  }
				  else
				  {
					  echo "There are no comments";
				  }
				  mysqli_close($conn);
				  ?>
            
          </div>
         
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