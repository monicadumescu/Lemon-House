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
          <h1 class="display-3 mt-5">Change password</h1>
          
        </div>
		</div>
		<div class="container">
        <!-- Example row of columns -->
		<div class="col-sm-12 col-lg-6 mt-3">
        <form action="change_pass.php" method="post" enctype="multipart/form-data">
			<label for="old_passord">Old password: </label>
          <input class="form-control mr-sm-1" type="password" placeholder="password"  name="old_password" required="required"> 
		  <label for="mew_password">New password: </label>
          <input class="form-control mr-sm-1" type="password" placeholder="password"  name="new_password" required="required"> 
		  <label for="new_password2">New password: </label>
          <input class="form-control mr-sm-1" type="password" placeholder="password"  name="new_password2" required="required"> 
		  
          <br><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button></br></br>

        </form>
		 <?php
	if(!empty($_POST))
			{
				$host = 'denismana.ddns.net';
				$user = 'denis';
				$pass = 'denis123';
				$database = 'login_info';
				$email=$_SESSION['email'];
				$password=$_POST['old_password'];
				$new_password=$_POST['new_password'];
				$new_password2=$_POST['new_password2'];
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   $old_passord=md5($password);
				   $sql="SELECT email FROM logintable WHERE email='$email' and password='$old_passord'";
				    $result = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($result);
					if($count==1)
					{
				   if(strlen($new_password)<4)
				          {
					         echo "Password is too short!";
				          }
			      else{
				   if($new_password===$new_password2)
				   {
					   $new_pass=md5($new_password);
				   $sql_out="update logintable set password= MD5('$_POST[new_password]') where email='$email'";
				   if(mysqli_query($conn, $sql_out) === TRUE)
				   {
					   echo "Password changed successessfully";
				   }
				   else
				   {
					   echo "Error";
				   }
				  
				   }
				  
				  else
				  {
					  echo "Your new password does not match";
				  }
				  }
			    }
					else
					{
						echo "Your password is incorrect please Re-Enter ";
					}
				   mysqli_close($conn);
			}
		?>
      </div>
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