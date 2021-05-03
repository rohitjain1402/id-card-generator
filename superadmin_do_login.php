<?php
	include 'url.php';
	include 'config.php';
	session_start();
	include 'user_auth.php';

	if(!isset($_POST)||empty($_POST)){
		header('Location:'.BASE_URL."superadmin_login.php");
		exit();
	}


	if($_POST['user_id']=="admin@232"&&$_POST['password']=="admin@232"){
		$_SESSION['superadmin']['id'] = $_POST['user_id'];
		header('Location:'.BASE_URL."superadmin.php");
		exit();
	}
	
	header('Location:'.BASE_URL."superadmin_login.php");
	exit();
?>