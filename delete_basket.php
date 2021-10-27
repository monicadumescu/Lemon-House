<?php
$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'basket';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
$id = $_GET['id']; // get id through query string
$del = mysqli_query($conn,"delete from BasketTable where id = '$id'");
if($del)

{
    mysqli_close($db);
    header("location:my_basket.php");
    exit; 
}

else

{
    echo "The data can be deleted due to some error";
}

?>