<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM register where Email='$email' and Password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        header("Location: home.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>