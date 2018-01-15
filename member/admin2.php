<?php
	require '../login(08.09.2017)_session/model/config.php';

	$currentMember = $member_menu = $subarea_menu = $tutorial_menu = $selected_member = "";
	$tutorialSrl = 1;
	$i = 0;
	$newArea = $newSub_area = $existing_Area = $selected_SubArea = $tutorialType = $selected_memberPass = "";
	$newAreaErr = $newSub_areaErr = "";
	$errFlag = $isAdmin = $selected_memberNo = 0;

	$query = "SELECT DISTINCT member.* FROM member,admin WHERE member.membership_no NOT IN (SELECT admin.membership_no FROM admin)";
	//$query = "SELECT * FROM member";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$i++;
			$res = $row['email'];
			$member_menu .= '<option value="'.$res.'">'.$res.'</option>';
		}
	}

	if($_SERVER['REQUEST_METHOD']=="POST"){

		//Remove Member::
		if (isset($_POST['memberbtn_Remove'])) {
			$selected_member = $_POST['memberElements_Edit'];
			$query = "DELETE FROM member WHERE email = '$selected_member'";
			$conn->query($query);
			header("location: admin.php");
		}

		//Add new admin::
		if (isset($_POST['memberbtn_Add'])) {

			$selected_member = $_POST['memberElements_Edit'];
			$query = "SELECT * FROM member WHERE email = '$selected_member'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$selected_memberNo = $row['membership_no'];
					$selected_memberPass = $row['password'];
				}
			}
			$query = "INSERT INTO admin (membership_no, password) VALUES (?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("is", $selected_memberNo, $selected_memberPass); //Binding parameters
			$stmt->execute(); //Executing prepared statement
			$stmt->close();
			header("location: admin.php");
		}

		if (isset($_POST['logout'])) {
			header("location: ./../login(08.09.2017)_session/content/logOut.php");
		}
	}
?>