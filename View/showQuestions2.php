<?php
	require '../../login(08.09.2017)_session/model/config.php';

	$i = $totalQuestions = 0;
	$questionNo = array();
	$show_questions = $question = "";

	$query = "SELECT question.* FROM question, sub_area WHERE sub_area.id = question.subarea_id AND sub_area.sub_area = '$showQuestions_subarea'";
	$result = $conn->query($query);
	$i = 0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$i++;
			$question = $row['question'];
			$questionNo[$i] = $row['question_no'];
			$show_questions .= '<input type="submit" name="question'.$i.'" value="'.$i.'. '.$question.'" style="width: 100%; color: black; padding: 1%; text-decoration: none; font-weight: bold; text-align: left; display: block; background-color: #e6f9ff;"><br>';
		}
		$totalQuestions = $i;
		$i = 0;
	}
	else{
		$show_questions = "No question was asked!";
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		for ($i=1; $i <= $totalQuestions; $i++) {
			$selected_questionNo = "question".$i;

			if(isset($_POST[$selected_questionNo])){
				//$_SESSION['question_table'] = $question_table;
				$_SESSION['selected_question'] = $i.". ".$question;
				$_SESSION['selected_questionNo'] = $questionNo[$i];
				header("location: answers.php");
			}
		}

		if (isset($_POST['previousPage'])) {
			header("location: questions.php");
		}
	}
?>