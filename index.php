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
            <a class="nav-link login" href="Login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link signup" href="signup.html">Sign up</a>
          </li>
         <li class="nav-item">
            <a class="nav-link contact" href="contact.html">Contact</a>
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
            <form action="loginProcess.php" method="post" enctype="multipart/form-data">
			<label for="email">Email address: </label>
          <input class="form-control mr-sm-1" type="email" placeholder="email" aria-label="email" required="required"> 
		  </br><label for="password">Password: </label></br>
		  <input class="form-control mr-sm-2" type="password" placeholder="password" aria-label="password" required="required"></br>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
         
         
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
</html>"
