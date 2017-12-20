<html>
    <head>
        <title>My first PHP Website</title>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
    <body>
        <h2>Home Page</h2>
        
		<p>Hello <?php Print "$user"?>!</p></br> 
 
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <form action="add.php" method="POST">
           Add more to list: <input type="text" name="details" /> <br/>
           Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
           <input type="submit" value="Add to list"/>
        </form>
    <h2 align="center">My list</h2>
	<table border ="1px" width="100%">
	<tr>
		<th>Id</th>
		<th>Details</th>
		<th>Post Time</th>
		<th>Edit Time</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Public Post</th>

	</tr>
	<?php
		$conn=mysqli_connect("localhost","root","") or die(mysql_error());
		mysqli_select_db($conn,"first_db") or die("Cannot connect to database"); 
		$query = mysqli_query($conn,"Select * from list");
		while($row= mysqli_fetch_array($query))
		{
			Print "<tr>";
				Print '<td allign ="center">'. $row['id']. "</td>";
				Print '<td allign ="center">'. $row['details']. "</td>";
				Print '<td allign ="center">'. $row['date_posted']. "-". $row['time_posted']."</td>";
				Print '<td allign ="center">'. $row['date_edited']. "-". $row['time_edited']."</td>";
				Print '<td allign ="center"> <a href= "edit.php?id='. $row['id'].'">edit</a> </td>';
				Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
				Print '<td allign ="center">'. $row['public']. "</td>";
			Print "</tr>";


		}
	?>
	</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?id=" + id);
			  }
			}
		</script>
	</body>
</html>
