<?php
	require '../../login(08.09.2017)_session/model/config.php';

	$area = $sub_area = "";
	$i = $selected_SubAreaId = 0;

	$query = "SELECT * FROM area";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$i++;
			$res = $row['area'];
			$area .= '<option value="'.$res.'">'.$res.'</option>';
		}
	}

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		if(isset($_POST['areabtn_askNew'])){
			$selectedArea = $_POST['areaElements_askNew'];
			$query = "SELECT sub_area.* FROM area, sub_area WHERE area.id = sub_area.area_id AND area.area = '$selectedArea'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$sub_area .= "<option>".$row['sub_area']."</option>";
				}
			}
		}

		if (isset($_POST['questioner_email']) AND $_POST['questioner_email'] != "" AND isset($_POST['questionText']) AND $_POST['questionText'] != "" AND isset($_POST['submit_questionBtn'])) {

			$selected_SubArea = $_POST['sub_areaElement'];
			$query = "SELECT * FROM sub_area WHERE sub_area = '$selected_SubArea'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$selected_SubAreaId = $row['id'];
				}
			}

			$questioner_email = $_POST['questioner_email'];
			$questionText = $_POST['questionText'];
			//$question_table = "questions_".$selected_SubArea;

			//Insert question into the corresponding question table::
			$query = "INSERT INTO question (questioner_email,  question, subarea_id) VALUES (?, ?, ?)";
			$stmt = $conn->prepare($query);
			if ($stmt == TRUE) {
				$stmt->bind_param("ssi", $questioner_email, $questionText, $selected_SubAreaId);
				$stmt->execute();
				$stmt->close();
				echo "<div style='color: green'>Question submitted successfully!</div>";
			}
			else{
				echo "<div style='color: red'>Error submitting question!</div>";
			}
		}
		elseif (isset($_POST['submit_questionBtn'])) {
			echo "<div style='color: red'>Fill all area!</div>";
		}
		//--------------------------------------------------------------------------

		if(isset($_POST['areabtn'])){
			$selectedArea = $_POST['areaElements'];
			$query = "SELECT sub_area.* FROM area, sub_area WHERE area.id = sub_area.area_id AND area.area = '$selectedArea'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$sub_area .= "<option>".$row['sub_area']."</option>";
				}
			}
		}

		if (isset($_POST['sub_areaElement']) AND isset($_POST['show_questionsBtn'])) {
			$_SESSION['showQuestions_subarea'] = $_POST['sub_areaElement'];
			header("location: showQuestions.php");
		}
	}
?>