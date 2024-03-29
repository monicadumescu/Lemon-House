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

</head>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
      $('.navbar-toggler').on("click", function () {
        $('.navbar-collapse').toggle('slow').addClass('opened');
      })
    </script>
	<script>
		$(document).ready(function(){
			var questionCount = -1;
			$("#zabutton").click(function(){
				questionCount = questionCount + 1;
				$("#questions_block").append( function(){
					$("#test_denis").load("load-questions.php", {
					questionNewCount: questionCount
					
					});
				});
			});
		});
</script>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="logo.svg" widh="100%" height="40" />
    </a>
    <button class="navbar-toggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home</a>
        </li>

        <li class="nav-item">
          <button class="nav-link dropdown-toggle bg-transparent btn" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Dropdown</button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="logout.php">Logout</a>
            <a class="dropdown-item" href="my_basket.php">My basket</a>
            <a class="dropdown-item" href="order.php">Finish and order</a>
            <a class="dropdown-item" href="live_coments.php">Leave a comment</a>
            <a class="dropdown-item" href="previous_orders.php">Previous orders</a>
            <a class="dropdown-item" href="change_pass.php">Change password</a>
            <a class="dropdown-item" href="generate_outfit.php">Generate outfit</a>
            <a class="dropdown-item" href="generate_outfit_interface.php">Debug</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <?php echo $_SESSION['email']; ?>
          </a>
        </li>
      </ul>
      <form action="search.php" class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="pt-5 pb-5 bg-light">
      <div class="container">
        <h1 class="display-3 mt-5">Generate outfit</h1>

	   </div>
	</div>
   </div>
   	
	<div id="questions_block">
	</div>
	<form method="get" action="receive_data.php">
	<div id="test_denis">
	</div>
	<button id="zabutton" type="button">GO!</button>
	<button type="submit">Submit</button>
	</form>
	

	
    <footer class="container mt-5">
      <p>&copy; Company 2020-2021</p>
    </footer>

</body>

</html>