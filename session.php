<?php

   session_start();
  $host = 'denismana.ddns.net';
				$user = 'denis';
				$pass = 'denis123';
				$database = 'login_info';
   $email = $_SESSION['email'];
   $conn = new mysqli($host, $user, $pass,$database);
   $ses_sql = mysqli_query($conn,"select email from logintable where email = '$email' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['email'])){
      header("location:page.html");
      die();
   }
?>