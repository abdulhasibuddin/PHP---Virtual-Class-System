<?php
	//This file destorys any existing session related to the current user::
	include 'session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	session_regenerate_id(true); //Generates new session at each page load
	
	session_destroy(); //Destroy session
	header("location: ../../view/public/home.php"); //Take the user to the login page
?>
