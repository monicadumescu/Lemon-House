<?php
    $url='denismana.ddns.net';
    $username='denis';
    $password='denis123';
    $conn=mysqli_connect($url,$username,$password,"fregister");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
?>