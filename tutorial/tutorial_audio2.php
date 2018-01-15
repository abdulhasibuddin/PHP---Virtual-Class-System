<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if (isset($_POST['backPage'])) {
			header("location: ../member/member.php");
		}
	}
?>