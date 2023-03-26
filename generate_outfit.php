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
    <div class="container">
      <!-- Example row of columns -->

      <div class="col-sm-12 col-lg-6 mt-3">

        <?php
       $host = 'localhost';
       $user = 'root';
       $pass = '';
       $database = 'products';




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



        $conn = new mysqli($host, $user, $pass, $database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql_out = "select distinct * from productstable where ";

        //filtram in functie de
        //eveniment
        //anotimp
        //preferinte
        
        $gen = "woman";
        $eveniment = "pool party";
        $anotimp = "summer";
        $preferinte = "sport";
        $buget = 500;
        $total_price = 0;

        $sql_out = $sql_out . "(name like '%{$eveniment}%' or description like '%{$eveniment}%') AND (name like '%{$anotimp}%' or description like '%{$anotimp}%')";


        $result_out = mysqli_query($conn, $sql_out);

        if ($result_out) {
          $count = mysqli_num_rows($result_out);

          //le afisam in functie de pret si de tip ca s rezulte un outfit
          /*Tipuri de produse: 
          1 - bluze, tricouri, etc.
          2 - pantaloni, fuste
          3 - pantofi
          4 - rochii
          5 - chestii de luat pe deasupra: geci, paltoane, etc.
          6 - chetii pt tinut chestii: genti, ghizdane, etc.
          7 - chetii de pus pe cap
          */

          while ($row = $result_out->fetch_assoc()) {
            $result_out2It = mysqli_query($conn, $sql_out);

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

        ?>

      </div>

    </div>

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
