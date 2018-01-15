<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load

	$selected_question = $question_table = $user = "";
	$showMsg = "<div style='color: red;'>*You must be logged-in to submit answer!</div>";
	$selected_questionNo = $membership_no = $answer_index = 0;

	if (isset($_SESSION['email']) AND isset($_SESSION['membership_no'])) {
		$showMsg = "";
		$user = $_SESSION['email'];
		$membership_no = $_SESSION['membership_no'];
		echo "<div style='text-align: right; color: indigo;'><h4>" . $user . "</h4></div>";
	}

	if (isset($_SESSION['selected_questionNo']) AND isset($_SESSION['selected_question'])) {
		//$question_table = $_SESSION['question_table'];
		$selected_questionNo = $_SESSION['selected_questionNo'];
		$selected_question = $_SESSION['selected_question'];
	}
	require '../answers2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Question&Answer</title>
</head>
<body>
	<form method="post" action="">
		<?php include './navbar.php'; ?>
		<table id="questionTable" style="margin-top: 6%;">
			<tr>
				<td>
					<table id="reviewTable"">
						<tr>
							<td>
								<div id="sub_column1"><input type="submit" name="up_score" value="/\"></div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="sub_column2"><?php echo '<div style="text-align: center; font-size: 30px;"><strong>'.$total_score.'</strong></div>'; ?></div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="sub_column3"><input type="submit" name="down_score" value="\/"></div>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table id="showQuestion_Email">
						<tr>
							<td>
								<div style="margin-left: 5%;"><?php echo "<div style='font-size: large;'>".$selected_question."</div>"; ?></div>
							</td>
						</tr>
						<tr>
							<td>
								<div style="margin-left: 5%;"><?php echo "<div style='font-size: small; color: indigo;'>by ".$questioner_email." at ".$question_date."</div>"; ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table><br><br>
		<div id="submitAnswer_table">
			<div id="row">
				<span id="column1" style="font-size: large; font-weight: bold;">Submit your answer here:</span>
				<span id="column2" style="width: 50%; float: right; font-size: small;"><?php

			echo $showMsg; ?></span>
			</div><br>
			<div id="row">
				<textarea id="column1" name="submitAnswer" style="width: 100%; height: 80px;"></textarea>
				<br>
				<input type="submit" name="submitAnswer_Btn" value="Submit answer" style="float: right; font-weight: bold; padding: 1%;">
			</div>
		</div><br><br><br><br>
		<?php
			echo "<div style='font-size: large; font-weight: bold;'>Total ".$totalAnswers." answers:</div><br>";
			for ($answer_index=1; $answer_index<=$totalAnswers; $answer_index++) { 
				//echo $answer_div;
				echo '<table id="answerTable'.$answer_index.'">
			<tr>
				<td>
					<table id="reviewTable_ans'.$answer_index.'">
						<tr>
							<td>
								<div id="sub_column1"><input type="submit" name="up_score_ans'.$answer_index.'" value="/\"></div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="sub_column2" style="text-align: center; font-size: 30px;"><strong>'.$total_score_ans[$answer_index].'</strong></div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="sub_column3"><input type="submit" name="down_score_ans'.$answer_index.'" value="\/"></div>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table id="showAnswer_Email'.$answer_index.'">
						<tr>
							<td>
								<div style="margin-left: 5%; font-size: large;">'.$answer_index.'. '.$show_answer[$answer_index].'</div>
							</td>
						</tr>
						<tr>
							<td>
								<div style="margin-left: 5%; font-size: small; color: indigo;">by '.$member_email[$answer_index].' at '.$answer_date[$answer_index].'</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table><br>';
			}
		?>
		<div style="">
			<input type="submit" name="previousPage" value="Previous Page">
		</div>
	</form>
</body>
</html>