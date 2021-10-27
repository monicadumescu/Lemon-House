<HTML>
<head>
<title>Login</title>
<style>
	form
	{
		padding:10px;
		margin:10px;
	}
	table{
		padding:10px;
		margin:10px;
	}
	#p1 {
		padding:10px;
		margin:10px;
		font-size:20px;
	}
	#p2{
		padding:10px;
		margin:10px;
	}
</style>
</head>
	
	
	<body>
	
		<form method="get" action="loginForm.php">
			Username: <input type="text" name="username"><br><br>
			Password: <input type="password" name="password"><br><br>
			
			<input type="submit" value="Log in">
			<button><a  href="signUpForm.php">Sign up </a></button> 
		</form>
		
		<?php
			if(!empty($_GET))
			{
				$username = $_GET['username'];
				$password = $_GET['password'];
				
					
				$host = 'localhost';
				$user = 'root';
				$pass = '';
				$error= mysql_error();
				$database = 'LoginInfo';
					
				$link = @mysql_connect($host,$user,$pass) or die ($error);
					
				mysql_select_db($database,$link)or die('Database Not found');
					
				$query1 = mysql_query('select * from LoginTable where username="'.$username.'" and  password="'.$password.'"; ')or die('You are not member of this site ! ');
				$query2 = mysql_query('select * from LoginTable where username="'.$username.'" and  password="'.$password.'"; ')or die('You are not member of this site ! ');
				$query3 = mysql_query('select * from LoginTable where username="'.$username.'" and  password="'.$password.'"; ')or die('You are not member of this site ! ');

				// RESULT SHOW IN THE TABLE--------
						
					
					if(mysql_fetch_array($query3)){
					
						while($row2 = mysql_fetch_array($query2))
						{		
							echo " <div id="."p1".">Welcome ".htmlentities($row2["firstname"])." ".htmlentities($row2["lastname"])." !</div>";					
							echo "<div id="."p2".">Your information :</div>";
						}
						
						echo "<table size="."0"."border="."black"." width="."400"." height="."100"." >";
					
						while($row1 = mysql_fetch_array($query1))
						{		
							echo "<tr><td> First Name</td><td>:".htmlentities($row1["firstname"])."</td></tr>";				
							echo "<tr><td> Last Name </td><td>:".htmlentities($row1["lastname"])."</td></tr>";		
							echo "<tr><td> Username </td><td>:".htmlentities($row1["username"])."</td></tr>";
							echo "<tr><td> Age </td><td>:".htmlentities($row1["age"])."</td></tr>";
							echo "<tr><td> Email </td><td>:".htmlentities($row1["email"])."</td></tr>";
							echo "<tr><td> Password </td><td>:".htmlentities($row1["password"])."</td></tr>";
						}
						echo "</table>";
					}
					else
					{	
						echo "You are not member of this site !";
						
					}
						
								
				@mysql_close($link);	
			}
			else
			{
								
			}
		
		?>
	</body>
</HTML>