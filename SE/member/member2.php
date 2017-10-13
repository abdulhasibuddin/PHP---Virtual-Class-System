<?php
	require '../login(08.09.2017)_session/model/config.php';

	$currentMember = "";
	$tutorialSrl = 1;
	if(isset($_session['email'])){
		$currentMember = isset($_session['email']);
	}

	$newArea = $newSub_area = $existing_Area = $existing_SubArea = "";
	$newAreaErr = $newSub_areaErr = "";
	$errFlag = 0;

	if($_SERVER['REQUEST_METHOD']=="POST"){

		//EDIT TUTORIAL::-------------------------------------------------------------


		//ADD NEW TUTORIAL::----------------------------------------------------------
		if(isset($_POST['tutorialName']) AND isset($_POST['sub_areaElement']) AND $_POST['tutorialName'] != ""){
			$existing_SubArea = $_POST['sub_areaElement'];
			$query = "SELECT id FROM $existing_SubArea ORDER BY id DESC LIMIT 1";
			$result = $conn->query($query);
			//echo "result= ".$result."subArea= ".$existing_SubArea." user= ".$user."<br>";
			while ($row = $result->fetch_assoc()) {
				$tutorialSrl = $row['id'] + 1;
				echo "tutorialSrl1=".$tutorialSrl;
			}
			echo "tutorialSrl = ".$tutorialSrl."<br>";
			$newTutorial = "tutorial_".$tutorialSrl."_".$_POST['tutorialName'];

			$query = "INSERT INTO $existing_SubArea (tutorial_name, created_by) VALUES (?, ?)";
			$stmt = $conn->prepare($query); //Processing prepared statement
			$stmt->bind_param("ss", $newTutorial, $user); //Binding parameters
			$stmt->execute(); //Executing prepared statement
			$stmt->close(); //Closing prepared statement
			echo "<div style='color:green;'>newTutorial ".$newTutorial." was inserted into ".$existing_SubArea." successfully!</div>";


			$query = "CREATE TABLE IF NOT EXISTS $newTutorial (
			page_no INT AUTO_INCREMENT PRIMARY KEY,
			navbarItem VARCHAR(150),
			content TEXT,
			create_date TIMESTAMP,
			UNIQUE (navbarItem)
			)";
			if($conn->query($query) == TRUE){
				/*$query = "INSERT INTO $existing_SubArea (tutorial_name, created_by) VALUES (?, ?)";
				$stmt = $conn->prepare($query); //Processing prepared statement
				$stmt->bind_param("ss", $newTutorial, $user); //Binding parameters
				$stmt->execute(); //Executing prepared statement
				$stmt->close(); //Closing prepared statement

				echo "<div style='color:green;'>newTutorial ".$newTutorial." was inserted into ".$existing_SubArea." successfully!</div>";*/
				echo "<div style='color:green;'>Table ".$newTutorial." created successfully!</div>";
			}
			elseif($newArea != ""){
				echo "<div style='color:red;'>Error creating table ".$newTutorial."!";
			}
		}

		//ADD NEW AREA::---------------------------------------------------------------
		if(isset($_POST['newArea']) AND $_POST['newArea'] != ""){
			$newArea = "area_".$_POST['newArea'];
			if(preg_match("/^[a-zA-Z_]$/", $newArea)) { //Regular expression comparison
				//If input is invalid::
				$newAreaErr =  "<div style='color:red;'>Only letters and (_) allowed!</div>";
				echo $newAreaErr;
				//$errFlag = 1;
			}
			else{
				$query = "CREATE TABLE IF NOT EXISTS $newArea (
				id INT AUTO_INCREMENT PRIMARY KEY,
				sub_area VARCHAR(150),
				create_date TIMESTAMP
				)";
				if($conn->query($query) == TRUE){
					$query = "INSERT INTO area (area) VALUES (?)";
					$stmt = $conn->prepare($query); //Processing prepared statement
					$stmt->bind_param("s", $newArea); //Binding parameters
					$stmt->execute(); //Executing prepared statement
					$stmt->close(); //Closing prepared statement

					echo "<div style='color:green;'>Table ".$newArea." created successfully!</div>";
				}
				elseif($newArea != ""){
					echo "<div style='color:red;'>Error creating table ".$newArea."!";
				}
				/*$query = "INSERT INTO area (area) VALUES (?)";
				$stmt = $conn->prepare($query); //Processing prepared statement
				$stmt->bind_param("s", $newArea); //Binding parameters
				$stmt->execute(); //Executing prepared statement
				$stmt->close(); //Closing prepared statement

				echo "<div style='color:green;'>New area <strong>".$newArea."</strong> was inserted successfully!</div>";*/
			}
		}

		//ADD NEW SUB_AREA::--------------------------------------------------------------
		if(!isset($_POST['existing_Area']) AND isset($_POST['newSub_area']) AND !empty($_POST['newSub_area'])){
			echo "Select area first!";
		}
		elseif(isset($_POST['ExistingAreaBtn']) AND isset($_POST['newSub_area'])) {
			$newSub_area = "subarea_".$_POST['newSub_area'];
			$existing_Area = $_POST['existing_Area'];
			echo "newSub_area=".$newSub_area."<br>existing_Area=".$existing_Area."<br>";

			if(preg_match("/^[a-zA-Z_]$/", $newSub_area)) { //Regular expression comparison
				//If input is invalid::
				$newSub_areaErr =  "<div style='color:red;'>Only letters and (_) allowed!</div>";
				echo $newSub_areaErr;
				//$errFlag = 1;
			}
			elseif($newSub_area != ""){
				$query = "CREATE TABLE IF NOT EXISTS $newSub_area (
				id INT AUTO_INCREMENT PRIMARY KEY,
				tutorial_name VARCHAR(150),
				type VARCHAR(10),
				created_by VARCHAR(150),
				create_date TIMESTAMP
				)";
				if($conn->query($query) == TRUE){
					$query = "INSERT INTO $existing_Area(sub_area) VALUES (?)";
					if($stmt = $conn->prepare($query)){
					$stmt->bind_param("s", $newSub_area); //Binding parameters
					$stmt->execute(); //Executing prepared statement
					echo "<div style='color:green;'>newSub_area ".$newSub_area." was inserted into ".$existing_Area." successfully!</div>";
					}
					else{
						$error = "<br>errNo: ".$conn->errno . ' ' . $conn->error;
	    				echo $error; // 1054 Unknown column 'foo' in 'field list'
					}
					$stmt->close(); //Closing prepared statement
					echo "<div style='color:green;'>Table ".$newSub_area." created successfully!</div>";
				}
				elseif($newArea != ""){
					echo "<div style='color:red;'>Error creating table ".$newSub_area."!</div>";
				}
				//echo "<div style='color:green;'>New sub-area <strong>".$newSub_area."</strong> was inserted successfully in area <strong>".$existing_Area."</strong>!</div>";
			}
		}
	}
?>