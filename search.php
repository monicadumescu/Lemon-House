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
          <li class="nav-item active">
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
            </div>
          </li>
		  		<li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?></a>
          </li>
        </ul>
        <form action="search.php" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div role="main">div role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          <h1 class="display-3 mt-5">Our Products</h1>
          
        </div>
		</div>
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="pt-5 pb-5 bg-light">
        <div class="container">
          

      </div> <!-- /container -->

    </div>
<div class="container">
        <!-- Example row of columns -->
        
          <div class="col-sm-12 col-lg-6 mt-3">

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'products';
				
$conn = new mysqli($host, $user, $pass,$database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(!empty($_GET))
 {
$data_in=$_GET['Search'];

$sql_search="select * from ProductsTable where name like '%{$data_in}%' ";
 $result_search=mysqli_query($conn,$sql_search);
 if($result_search)
 {
$count_search = mysqli_num_rows($result_search);
if($count_search)
 {
while($row=$result_search->fetch_assoc())
{
 $s=$row['files'];?> 


<div class='div2'><style> .div2 { border-style:groove;}</style><img src="<?php echo $s; ?>" alt="HTML5 Icon" style="width:500px;height:500px">
<br>Category:
<?php echo $row["name"]; ?> <br>Price: <?php echo $row['price']; ?>
<br>Size:<?php echo $row['si_ze']; ?>
<br>Description: <?php echo $row['description']; ?> 
<br><a class="btn btn-outline-success my-2 my-sm-1" href="add_chart.php?id=<?php echo $row['id']; ?>"  type="submit">Add to chart</a></div><br>
<?php }
 }
 else
 {
	 echo "There are no such products";
 }
 }
 }
 ?>

		  </form>
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