<html>
	<head>
		<title>My first website</title>
	</head>
	<body>
		<?php 
			echo "<p>Hello World!</p>"; 
		?>
		<a href="login.php"> Click here to login </a></br>
		<a href="register.php"> Click here to register </a>
	</body>
	<br/>
	<h2 allign="center">List</h2>
	<table width="100%" border="1px">
	<tr>
		<th>Id</th>
		<th>Details</th>
		<th>Post Time</th>
		<th>Edit Time</th>
	</tr>
	<?php
	
	$connec = mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_select_db($connec,"first_db") or die("Cannot connect to database");
	$query=mysqli_query($connec,"Select * from list where public='yes'");
	while($row = mysqli_fetch_array($query))
	{
		Print "<tr>";
			Print '<td align="center">'.$row['id']."</td>";
			Print '<td align="center">'.$row['details']."</td>";
			Print '<td align="center">'.$row['date_posted']."-".$row['time_posted']."</td>";
			Print '<td align="center">'.$row['date_edited']."-".$row['time_edited']."</td>";
		Print "</tr>";

	}
?>
</table>
</html>

