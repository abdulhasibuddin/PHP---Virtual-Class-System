<?php
	require '../login(08.09.2017)_session/model/config.php';

	$addNavbarItem = $textContent = $selectedItem = "";
	$tutorial_no = 0;
	//echo "Tutorial = ".$tutorial."<br>";

	//EDIT CONTENTS::-----------------------------------------------------------------
	//SHOW EXISTING NAVBAR ITEMS::
	$query = "SELECT content_general.* FROM tutorial, content_general WHERE tutorial.id = content_general.tutorial_id AND tutorial.tutorial_name = '$tutorial'";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$item = $row['navbarItem'];
			$existingItems .= '<option value="'.$item.'">'.$item.'</option>';
		}
	}
	//END of 'SHOW EXISTING NAVBAR ITEMS'.---------------------------------------------

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		//UPDATE CONTENT to DATABASE::-----------------------------------------------------
		if (isset($_POST['saveContent']) AND isset($_POST['textContent']) AND $_POST['textContent'] != "") {
			$selectedItem = $_POST['existingItems'];
			$textContent = $_POST['textContent'];
			$textContent = mysqli_real_escape_string($conn, $textContent);
			echo "<br>selectedItem=".$selectedItem."; tutorial=".$tutorial.";<br>";
			$query = "UPDATE content_general SET content='".$textContent."' WHERE navbarItem='".$selectedItem."'";
			if ($conn->query($query) == TRUE) {
				echo "<div style='color:green;'>Content updated successfully corresponding to selectedItem <strong>".$selectedItem."</strong> in table <strong>".$tutorial."</strong></div>";
			}
			else {
				echo "<div style='color:red;'>Error updating content: ".$conn->error."</div>";
			}
		}
		//END of 'UPDATE CONTENT to DATABASE'.---------------------------------------------
		//END of 'EDIT CONTENTS'.----------------------------------------------------------
		//REDIRECT to PREVIEW PAGE::-------------------------------------------------------
		if (isset($_POST['previewContent'])) {
			$_SESSION['tutorial'] = $tutorial;
			$_SESSION['email'] = $user;
			header("location: preview.php");
		}

		//ADD NAVBAR ITEM::-----------------------------------------------------------
		if(isset($_POST['addNavbarItem_Btn']) AND $_POST['addNavbarItem'] != ""){
			$addNavbarItem = $_POST['addNavbarItem'];

			$query = "SELECT * FROM tutorial WHERE tutorial_name = '$tutorial'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$tutorial_no = $row['id'];
				}
			}

			$query = "INSERT INTO content_general (tutorial_id, navbarItem) VALUES (?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("is", $tutorial_no, $addNavbarItem);
			$stmt->execute();
			$stmt->close();

			echo "<div style='color:green;'>NavbarItem <strong>".$addNavbarItem."</strong> has been inserted into tutorial <strong>".$tutorial."</strong> successfully!";

		}
		//END of 'ADD NAVBAR ITEM'::--------------------------------------------------
		//BACK to PREVIOUS PAGE::
		if (isset($_POST['backPage'])) {
			header("location: ../member/member.php");
		}
	}
?>