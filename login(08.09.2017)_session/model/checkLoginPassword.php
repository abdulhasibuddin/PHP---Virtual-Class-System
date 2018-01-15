<?php
	//This file gets the password from the database of the corresponding username::
	//This file is required in 'loginPage2.php'
	require 'config.php'; //Opening database connection
	
	//Prevent SQL Injection type vulnerability::
	$eMail = mysqli_real_escape_string($conn, $eMail);
	//$checkPassword = mysqli_real_escape_string($conn, $checkPassword);

	if($isAdmin == 1){
		$query = "SELECT admin.* FROM member, admin WHERE admin.membership_no = member.membership_no AND member.email = ?";
	}
	else{
		$query = "SELECT * FROM member WHERE email = ?";
	}
	$stmt = $conn->prepare($query); //Processing prepared statement
	$stmt->bind_param("s", $eMail); //Binding parameters
	$stmt->execute(); //Executing prepared statement
	$chkResult = $stmt->get_result(); //Get the result
	$chkResult->fetch_all(); //Fetch all the column values of the selected row

	$stmt->close(); //Closing prepared statement
	$conn->close(); //Close database connection
?>
