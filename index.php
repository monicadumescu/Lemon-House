<?php
 session_start();
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
          <li class="nav-item">
            <a class="nav-link" href="page.html">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link login" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link signup" href="signup.php">Sign up</a>
          </li>
         <li class="nav-item">
            <a class="nav-link contact" href="contact.html">Contact</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="coments.php">Comments</a>
          </li>
        </ul>

      </div>
    </nav>

    <div role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          <h1 class="display-3 mt-5">Login</h1>
          <p>Login into your account and let the shopping  begin!</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->

          <div class="col-sm-12 col-lg-6 mt-3">
            <form action="Login.php" method="get" enctype="multipart/form-data">
			<label for="email">Email address: </label>
          <input class="form-control mr-sm-1" type="email" placeholder="email" aria-label="email" name="email" required="required">
		  </br><label for="password">Password: </label></br>
		  <input class="form-control mr-sm-2" type="password" placeholder="password" aria-label="password"  name="password" required="required"></br>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button></br>

        </form>
<?php
			if(!empty($_GET))
			{
				$email = $_GET['email'];
				$password = $_GET['password'];


				$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'login_info';

				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
				   $encode_pass=md5($password);
				$sql="SELECT email FROM LoginTable WHERE email='$email' and password='$encode_pass'";
				 $result = mysqli_query($conn,$sql);


                 $count = mysqli_num_rows($result);

                 if ($count==1) {
                  // output data of each row

                    session_start();
                   $_SESSION['email'] = $email;

                   header("location: home.php");
				   if($email=="dumescumonica@gmail.com")
				   {
					   session_start();
                   $_SESSION['email'] = $email;

                   header("location: home_admin.php");
				   }
                 }
                   else {
                       echo "Incorrect credentials! Please try again!";


				$conn->close();
			}
			}

		?></br>
		 </br><p>You don't have an account?</p>
         <p><a class="btn btn-primary btn-lg" href="signup.php" role="button">Sign up&raquo;</a></p>

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
