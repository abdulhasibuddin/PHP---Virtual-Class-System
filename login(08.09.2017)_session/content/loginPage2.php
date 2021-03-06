<?php
	//After submitting the form of 'loginPage.php', submitted 'name' properies are processed in this file::
	include 'session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	session_regenerate_id(true); //Generates new session at each page load

	$eMail = $password = $verPass = $captcha =  "";
	$err = $captchaErr =  "";
	$errFlag = $membership_no = $isAdmin = 0; //If any error occures, this flag would be valued 1
	$userExists = 1;
	//-----------------------------------------------------------------

	if (isset($_SESSION['admin'])) {
		$eMail = $_SESSION['admin'];
		$isAdmin = 1;
	}
	elseif(isset($_SESSION['email'])){
		header("location: ../../member/member.php");
	}

	require 'secureInput.php'; //This file checks for cross-site scripting(XSS) vulnerability	
	//-----------------------------------------------------------------

	if($_SERVER["REQUEST_METHOD"]=="POST") { //Checking if the form was submitted as POST
		$eMail = secureInput($_POST["email"]); //XSS vulnerability checking of input username

		if(strlen($eMail) > 255) {
			$err = "Invalid input!"; 
			$errFlag = 1;
		}
		
		if(!filter_var($eMail, FILTER_VALIDATE_EMAIL)) { //Regular expression comparison
			//If input username is invalid::
			$err = "Invalid input!";
			$errFlag = 1;
		}
		else { //If input is OK::
			//$uName = $userName;
			require '../model/checkUniqueUserName.php'; //This file checks if the username/email exists or not
			foreach($result as $value){ //Traverse columns of the selected row
				if(!count(array_filter($value)) > 0) {//If user does not exist...
					$err = "Incorrect username or password!"; //notify user...
					$errFlag = 1; //set error flag high
					$userExists = 0;
				}
			}
		}
	//-----------------------------------------------------------------

		$password = secureInput($_POST["password"]); //XSS vulnerability checking of input password
		if(strlen($password) > 255) {
			$err = "Invalid input!"; 
			$errFlag = 1;
		}
		if(!preg_match("/^[a-zA-Z0-9_]{1,255}$/", $password)) { //Regular expression comparison
			$err = "Invalid input!";
			$errFlag = 1;
		}
		elseif($userExists == 1 AND $errFlag == 0) {
			require '../model/checkLoginPassword.php';

			foreach($chkResult as $value){ //Traversing columns of the selected row
				if(count(array_filter($value)) > 0) { //If username/account exists...
					$verPass = $value["password"]; //get the encrypted password stored in the database corresponding to the username...
					$membership_no = $value["membership_no"];
				}
				else {
					//If username/account does not exist::
					$err = "Incorrect username or password!"; 
					$errFlag = 1;
				}
			}

			//password_verify('Unencrypted password needs to be verified', 'Encrypted password to be verified with')::
			if (!password_verify($password, $verPass)) { //Verify the user input password with the stored password,
				//if they don't match::
				$err = "Incorrect username or password!";
				$errFlag = 1;
				$membership_no = 0;
			}
		}
	//-----------------------------------------------------------------

		
		//$_POST["captcha"]-> captcha code input by the user [here, 'vercode' is the name of the captcha input field; don't be 	confused with the session 'vercode'!]
		//$_SESSION["vercode"]-> session 'vercode' holding the actual captcha code

		if(isset($_SESSION["vercode"])){ //Check if session 'vercode' is set
			$captcha = secureInput($_POST["captcha"]);

			if(!preg_match("/^[a-zA-Z0-9_]{1,6}$/", $captcha)) { //Regular expression comparison
				//If input username is invalid::
				$captchaErr =  "Incorrect captcha!";
				$errFlag = 1;
			}
			if(strlen($captcha) > 255) {
				$captchaErr =  "Incorrect captcha!";
				$errFlag = 1;
			}
			elseif($captcha != $_SESSION["vercode"] OR $_SESSION["vercode"] == ""){
				//If the captcha input is not correct or if the session 'vercode' does not contain any captcha::
				$captchaErr =  "Incorrect captcha!";
				$errFlag = 1;
			}
			else{
				session_unset($_SESSION["vercode"]); //Unsetting session 'vercode' when captcha is confirmed
			}	
		}	
	}
	//-----------------------------------------------------------------

	if ($eMail != "" AND $password != "" AND $errFlag == 0) { //If the username and password fields are not empty and if there is no other error...
		if($isAdmin == 1){
			$_SESSION['admin'] = $eMail;
			header("location: ../../member/admin.php");
		}
		elseif ($isAdmin == 0) {
			$_SESSION['email'] = $eMail; //assign the username to the session 'user'...
			$_SESSION['membership_no'] = $membership_no;
			header("location: ../../member/member.php"); //take the user to his/her own authenticated page
		}
	}
?>
