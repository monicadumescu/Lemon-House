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
          <li class="nav-item">
            <a class="nav-link login" href="Login.php">Login</a>
          </li>
          <li class="nav-item active">
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
          <h1 class="display-3 mt-5">Sign up</h1>
          <p>You don't have an account?</p>
		  <p>Then make one and join us!</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        
          <div class="col-sm-12 col-lg-6 mt-3">
            <form action="signup.php" method="post" enctype="multipart/form-data">
			<label for="email">Email address: </label>
          <input class="form-control mr-sm-1" type="email" placeholder="email" aria-label="email" name="email" required="required"> 
		  </br><label for="username">Username: </label>
          <input class="form-control mr-sm-1" type="text" placeholder="username" aria-label="username" name="username" required="required"> 
		  </br><label for="password">Password: </label></br>
		  <input class="form-control mr-sm-2" type="password" placeholder="password" aria-label="password" name="password" required="required"></br>
		  <label for="password">Please write your password again: </label>
		  <input class="form-control mr-sm-2" type="password" placeholder="password" aria-label="password" name="password1" required="required"></br>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign up</button>
        </form>
         <?php
			if(!empty($_POST))
			{
			
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$password1 =$_POST['password1'];
					if($password == $password1)
					{
						
					$host = 'denismana.ddns.net';
					$user = 'denis';
					$pass = 'denis123';
					$database = 'login_info';
					
					$conn = new mysqli($host, $user, $pass,$database);
				    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
					if(strlen($password)<4)
				          {
					         echo "Password is too short!";
				          }
			      else{
					  $encode_pass=md5($password);
					$sql = "INSERT INTO logintable (email, username, password) VALUES ('$email', '$username', '$encode_pass')";
					$sql_mail="SELECT email FROM logintable WHERE email='$email'";
					$result = mysqli_query($conn,$sql_mail);
                     $count = mysqli_num_rows($result);
					 if($count==0)
					 {
					   if ($conn->query($sql) === TRUE) {
                         echo "Thank you for sign up :)";
                        } else {
                               echo "Error: " . $sql . "<br>" . $conn->error;
                                }

					}
					else{
						echo "This email already has an account!";
					}
					}
					}
					else 
					{
						echo "<div id="."p2".">Your password is incorrect please Re-Enter </div>";
					}
					
					
				
			$conn->close();	
			}
			
			
		?></br>
         </br><p>Already have an account?</p>
         <p><a class="btn btn-primary btn-lg" href="Login.php" role="button">Login&raquo;</a></p>
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