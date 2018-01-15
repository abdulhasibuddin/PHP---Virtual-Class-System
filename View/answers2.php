<?php
	require '../../login(08.09.2017)_session/model/config.php';

	$total_score = $membership_no_ans = $totalAnswers = 0;
	$questioner_email = $submitAnswer = "";
	$question_date = 0.0;
	$total_score_ans = $answer_date = $show_answer = $member_email = $selected_answerNo = array();

	$query = "SELECT * FROM question WHERE question_no = $selected_questionNo";
	$result = $conn->query($query);
	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			$total_score = $row['question_score'];
			$questioner_email = $row['questioner_email'];
			$question_date = $row['question_date'];
		}
	}

	$query = "SELECT answers.*, member.* FROM answers, member WHERE answers.question_no = $selected_questionNo AND answers.membership_no = member.membership_no";
	$result = $conn->query($query);
	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			$totalAnswers++;
			$total_score_ans[$totalAnswers] = $row['answer_score'];
			$selected_answerNo[$totalAnswers] = $row['answer_no'];
			$answer_date[$totalAnswers] = $row['answer_date'];
			$show_answer[$totalAnswers] = $row['answer'];
			$member_email[$totalAnswers] = $row['email'];
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		if (isset($_POST['up_score']) OR isset($_POST['down_score'])) {
			
			if (isset($_POST['up_score'])) {
				$total_score++;
			}
			elseif (isset($_POST['down_score'])) {
				$total_score--;
			}

			$query = "UPDATE question SET question_score = $total_score WHERE question_no = $selected_questionNo";
			if ($conn->query($query) == TRUE) {
				header("location: answers.php");
			}
		}

		if (isset($_POST['previousPage'])) {
			header("location: showQuestions.php");
		}

		//SUBMIT ANSWER::----------------------------------------------------------
		if (isset($_POST['submitAnswer_Btn']) AND $_POST['submitAnswer'] != "") {

			$submitAnswer = $_POST['submitAnswer'];
			//echo "selected_questionNo=".$selected_questionNo."; membership_no=".$membership_no."; submitAnswer=".$submitAnswer;

			$query = "INSERT INTO answers (question_no, membership_no, answer) VALUES (?, ?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("iis", $selected_questionNo, $membership_no, $submitAnswer);
			$stmt->execute();
			$stmt->close();
			//$showMsg = "<div style='color: green'>Answer submitted successfully!</div>";
			header("location: answers.php");
		}

		//ANSWER SCORES::----------------------------------------------------------
		for ($i=1; $i<=$totalAnswers; $i++) {
			$upName = 'up_score_ans'.$i;
			$downName = 'down_score_ans'.$i;

			if (isset($_POST[$upName]) OR isset($_POST[$downName])) {
				
				if (isset($_POST[$upName])) {
					$total_score_ans[$i]++;
					//$total_score++;
				}
				elseif (isset($_POST[$downName])) {
					$total_score_ans[$i]--;
					//$total_score--;
				}

				$query = "UPDATE answers SET answer_score = $total_score_ans[$i] WHERE answer_no = $selected_answerNo[$i]";
				if ($conn->query($query) == TRUE) {
					header("location: answers.php");
				}
			}
		}
	}
?>