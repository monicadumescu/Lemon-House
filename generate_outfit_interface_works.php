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
   <?php
   function generate_outfit_function($fanotimp,$fstil,$focazie,$fpret,$fmarime,$fgen)
   {
	   $fhost = 'denismana.ddns.net';
        $fuser = 'denis';
        $fpass = 'denis123';
        $fdatabase = 'products';



        $clothesMap = array(
          "hoodie" => "casual",
          "coat" => "casual",
          "t-shirt" => "casual",
          "jeans" => "casual",
          "swimsuit" => "sport",
          "skirt" => "casual",
          "jacket" => "casual",
          "trainers" => "casual",
          "hat" => "casual",
          "backpack" => "casual",
          "shorts" => "sport",
          "gumshoes" => "sport",
          "cap" => "sport",
          "mayow" => "sport",
          "flip-flop" => "sport",
          "fanny pack" => "sport",
          "dress" => "elegant",
          "sweater" => "elegant",
          "oxford shoes" => "elegant",
          "suit" => "elegant",
          "high heels" => "elegant",
          "tie" => "elegant",
          "overcoat" => "elegant",
          "polo shirt" => "elegant",
          "shirt" => "elegant",
          "pants" => "elegant",
          "purse" => "elegant"
        );
		$gen = $fgen;
        $eveniment = $focazie;
        $anotimp = $fanotimp;
        $preferinte = $fstil;
        $buget = $fpret;
		$fconn = new mysqli($fhost, $fuser, $fpass, $fdatabase);
        if ($fconn->connect_error) {
          die("Connection failed: " . $fconn->connect_error);
        }
        $fsql_out = "select distinct * from productstable where ";

		$fsql_out = $fsql_out . "(name like '%{$eveniment}%' or description like '%{$eveniment}%') AND (name like '%{$anotimp}%' or description like '%{$anotimp}%')";
		$fresult_out = mysqli_query($fconn, $fsql_out);

        if ($fresult_out) {
          $fcount = mysqli_num_rows($fresult_out);
		
		while ($frow = $fresult_out->fetch_assoc()) {
            $fresult_out2It = mysqli_query($fconn, $fsql_out);

            foreach ($clothesMap as $key => $value) {

              if ($gen != "woman" && ($row["name"] == "skirt" || $row["name"] == "dress" || $row["name"] == "purse" || $row["name"] == "swimsuit")) {
                continue;
              }

              if ($key == $row["name"] && $value == $preferinte && $row["price"] < $buget) {

                $s = $row['files']; ?>
                <div class='div2'>
                  <style>
                    .div2 {
                      border-style: groove;
                    }
                  </style><img src="<?php echo $s; ?>" alt="HTML5 Icon" style="width:500px;height:500px">
                  <br>Category:
                  <?php echo $row["name"]; ?> <br>Price:
                  <?php echo $row['price']; ?>
                  <br>Size:
                  <?php echo $row['si_ze']; ?>
                  <br>Description:
                  <?php echo $row['description']; ?>
                  <br><a class="btn btn-outline-success my-2 my-sm-1" href="add_chart.php?id=<?php echo $row['id']; ?>"
                    type="submit">Add to chart</a>
                </div><br>

              <?php
              }
            }
          }

        } else {
          echo "There are no outfits that match your input";
        }
        $conn->close();

			
   }
   $host = 'denismana.ddns.net';
   $user = 'denis';
    $pass = 'denis123';
   $database = 'questions';
   $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	$count = 1;
	echo "<form method='post' action='generate_outfit.php'>";
	$sql_out = "SELECT * from questionstable";
	$result_out = mysqli_query($conn, $sql_out);
	while ($row = $result_out->fetch_assoc()) {
		$question_id = "ans" . "{$row['id_question']}";
		$div_id = "mydiv" . "{$count}";
		if($count == 1){
			echo "<div id={$div_id}>";
		}
		else{
			echo "<div id={$div_id} class = 'hide'}>";
		}
        echo "{$row['name']}<br><br>";
		$sql_out2 = "SELECT * from answerstable WHERE {$row['id_question']} = id_question_a";
		$result_out2 = mysqli_query($conn, $sql_out2);
		while ($row2 = $result_out2->fetch_assoc()) {
			$name_answer = $row2['name_answer'];
			echo "<input type='radio' name={$question_id} id={$name_answer} value={$name_answer} required>";
			echo "<label for={$name_answer}>{$name_answer}</label><br>";
			
		}
		echo "</div>";
		//echo '<button id="continue-loop">Continue Loop</button>';
		$count = $count + 1;
	}
	echo "<input type='submit' name='someAction' value='GO'>";
	echo "</form>";
   ?>

    <footer class="container mt-5">
      <p>&copy; Company 2020-2021</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      $('.navbar-toggler').on("click", function () {
        $('.navbar-collapse').toggle('slow').addClass('opened');
      })
    </script>
	
</body>

</html>