<?php

   include('session.php');

$host = 'denismana.ddns.net';
$user = 'denis';
$pass = 'denis123';
$database = 'products';
$new_database='basket';			
$conn = new mysqli($host, $user, $pass,$database);
				
$new_conn=new mysqli($host, $user, $pass,$new_database);
				
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // get id through query string
$email=$_SESSION['email'];
$sql_in = "select id, price from productstable where id = '$id'";

$result_out=mysqli_query($conn,$sql_in);
$count = mysqli_num_rows($result_out);
if($count ==1)
	{
		while($row=$result_out->fetch_assoc())
		{
		 $new_id=$row['id'];
		 $price=$row['price'];
		 if ($new_conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
		 $sql = "INSERT INTO baskettable (email, products, price) VALUES ('$email', '$new_id', '$price')";
		 if ($new_conn->query($sql) === TRUE) {
                         echo "Thank you for adding a product :)";
                        } else {
                               echo "Error: " . $sql . "<br>" . $conn->error;
                                }
	 }
	 }
    
header("location:home.php");
    exit; 



?>