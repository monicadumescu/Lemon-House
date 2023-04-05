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
          <h1 class="display-3 mt-5">Leave a comment</h1>
          
        </div>
		</div>
		<div class="container">
        <!-- Example row of columns -->
        
          <div class="col-sm-12 col-lg-6 mt-3">
		  <form action="live_coments.php" method="get" enctype="multipart/form-data">
			<label for="address">Your comment: </label>
          <input class="form-control mr-sm-1" type="text" placeholder="comment" aria-label="comment" name="comment" required="required"> 
		  
		  
          <br><button class="btn btn-outline-success my-2 my-sm-0" onclick=add_data() type="submit">Submit</button></br></br>
         <h2>Comments from other users </h2>

        </form>
		  <?php
	
				$host = 'denismana.ddns.net';
				$user = 'denis';
				$pass = 'denis123';
				$database = 'comments';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   if(!empty($_GET))
			     {
				    $email = $_SESSION['email'];
				    $comment = $_GET['comment'];
				
				
				    $sql = "INSERT INTO commentstable (email,comments) VALUES ('$email', '$comment')";
				    
			           if ($conn->query($sql) === TRUE) {
                         echo "Thank you for your comment! :)";
                        } else {
                               echo "Error: " . $sql . "<br>" . $conn->error;
                                }
			     }
				   $sql_out="select id, email, comments from commentstable";
				   $result_out=mysqli_query($conn,$sql_out);
				   $count = mysqli_num_rows($result_out);
				   
				  if($count >0)
				  {
					  while($row=$result_out->fetch_assoc())
					  {
						  if($row["email"]==$_SESSION['email'])
						  {
							  ?> <div class='div1'> <style> .div1 {font-weight: bold;}
						</style> <?php echo $row["email"];?> </div><div class='div2'><style> .div2 { border-style:groove;}</style><?php echo $row["comments"]; ?> 
						</br><a class="btn btn-outline-success my-1 my-sm-1" href="delete_comments_user.php?id=<?php echo $row['id']; ?>">Delete</a></div></br>
						 <?php }
						  else
						  { ?>
						<div class='div1'> <style> .div1 {font-weight: bold;}
						</style> <?php echo $row["email"]; ?></div><div class='div2'><style> .div2 { border-style:groove;}</style><?php echo $row["comments"]; ?></div></br>
						<?php  }
					  }
				  }
				  else
				  {
					  echo "There are no comments";
				  }

			
		$conn->close();
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