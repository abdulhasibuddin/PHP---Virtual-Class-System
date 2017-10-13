<?php
	require '../login(08.09.2017)_session/model/config.php';

	$addNavbarItem = "";
	echo "Tutorial = ".$tutorial."<br>";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		//ADD NAVBAR ITEM::--------------------------------------------------------------
		if(isset($_POST['addNavbarItem_Btn']) AND $_POST['addNavbarItem'] != ""){
			$addNavbarItem = $_POST['addNavbarItem'];

			$query = "INSERT INTO $tutorial (navbarItem) VALUES (?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $addNavbarItem);
			$stmt->execute();
			$stmt->close();

			echo "<div style='color:green'>NavbarItem <strong>".$addNavbarItem."</strong> has been inserted into tutorial <strong>".$tutorial."</strong> successfully!";
			/*}
			else{
				echo "<div style='color:red'>Error uploading data!</div>";
			}*/
		}
		//END of 'ADD NAVBAR ITEM'::-----------------------------------------------------
	}
?>