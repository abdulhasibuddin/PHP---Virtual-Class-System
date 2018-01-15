<?php

	//COLLECT EXISTING NAVBAR ITEMS from DATABASE::
	$existingItems = $showContent = "";
	$content = array();
	$i = $totalItems = 0;
	$query = "SELECT content_general.* FROM content_general, tutorial WHERE tutorial.id=content_general.tutorial_id AND tutorial.tutorial_name='$tutorial'";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$i++;
			$item = $row['navbarItem'];
			$existingItems .= '<input type="submit" name="item'.$i.'" value="'.$item.'" style="width: 100%; color: white; padding: 5%; text-decoration: none; font-weight: bold; text-align: left; display: block; background-color: green;">';
			$content[$i] = $row['content'];
		}
		$totalItems = $i;
		$i = 0;
	}
	
	$showContent = $content[1];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		//BACK to PREVIOUS PAGE::
		if (isset($_POST['backPage'])) {
			header("location: tutorial.php");
		}
		//
		for ($i=1; $i <= $totalItems; $i++) { 
			
			$itemNo = "item".$i;
			if(isset($_POST[$itemNo])){
				$showContent = $content[$i];
			}
		}
	}
?>