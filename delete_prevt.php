<?php
$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'orders';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
$id = $_GET['id']; // get id through query string
$del = mysqli_query($conn,"delete from OrdersTable where id = '$id'");
if($del)

{
    mysqli_close($db);
    header("location:previous_orders_admin.php");
    exit; 
}

else

{
    echo "The data can be deleted due to some error";
}

?>