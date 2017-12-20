<html>
	<head>
		<title> My first website </title>
	</head>
	<body>
		<h2>Registration page</h2>
		<a href ="index.php"> Click here to go back</a><br/><br/>
		<form action="register.php" method="POST">
			Enter Username: <input type="text" name="username" required="required" /><br/>
			Enter Password: <input type="password" name="password" required="required" /><br/>
			<input type="submit" value="Register" /><br/>
		</form>
	</body>
</html>
<?php
$con=mysqli_connect("localhost","root","");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	//echo "username entered is:".$username."<br/>";
	//echo "password entered is:".$password;
	$bool = true;
	
	mysqli_select_db($con,"first_db") or die("Cannot connect to database");
	$query = mysqli_query($con, "Select * from users");
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['username'];
		if($username == $table_users)
		{
			$bool= false;
			print '<script>alert("username has been taken!");</script>';
			print '<script>window.location.assign("register.php");</script>';
		}
	}
	if($bool)
	{
		mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username','$password')");
		print '<script>alert("Successfully registered!");</script>';
		print '<script>window.location.assign("register.php");</script>';
	}
}
//  -------------------------------   4   ------------------------------------------------------
?>
