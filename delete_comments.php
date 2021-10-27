<?php
$host = 'localhost';
				$user = 'root';
				$pass = '';
				$database = 'comments';
				
				$conn = new mysqli($host, $user, $pass,$database);
				if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                   }
$id = $_GET['id']; // get id through query string
$del = mysqli_query($conn,"delete from CommentsTable where id = '$id'");
if($del)

{
    mysqli_close($db);
    header("location:coments_admin.php");
    exit; 
}

else

{
    echo "The data can be deleted due to some error";
}

?>