<?php
	$serverName = "localhost"; //Your database server name
	$username = "root"; //Your database password
	$pass = ""; //Your database password
	$dbName = "se"; //Your database name
	$conn = new mysqli($serverName, $username, $pass, $dbName) ; //Reconnecting to the database server
	if($conn->connect_error) //Check for any connection error to the database
	{
		die("Connection failed!"); //Show error message for connetion error
	}
	$area = $sub_area = "";
	

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$area = $_POST["area"];
		echo "area=".$area;
		$sub_area = $_POST["sub_area"];
		echo "<br>sub_area=".$sub_area;
		/*if(!preg_match("/^[a-zA-Z0-9]$/", $area))
		{
			if(isset($_POST["area"])) { $area="error!"; }
		}*/
	}
	//$stmt = $conn->prepare("INSERT INTO area (area) VALUES (?)");
	$stmt = $conn->prepare("INSERT INTO sub_area (area, sub_area) VALUES (?, ?)");
	$area = mysqli_real_escape_string($conn, $area);
	$sub_area = mysqli_real_escape_string($conn, $sub_area);

	$stmt->bind_param("ss", $area, $sub_area); //Binding parameters into prepared statement
	$stmt->execute(); //Execute query

	$stmt->close(); //Closing prepared statement
	$conn->close(); //Closing connection
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form method="POST" action="">
		<table>
			<tr>
				<td><?php echo "string=".$area;?></td>
			</tr>
			<tr>
				<td><input type="text" name="area"></td>
				<td><input type="text" name="sub_area"></td>
				<td><input type="submit" value="Submit"></td>
			</tr>

		</table>
	</form>
</body>
</html>