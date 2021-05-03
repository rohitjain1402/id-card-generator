<?php
include 'url.php';
include 'config.php';
session_start();
include 'user_auth.php';

if(!isset($_POST)||empty($_POST)){
	header('Location:'.BASE_URL."superadmin_login.php");
	exit();
}
if(!isSuperAdminLoggedIn()){
	header('Location:'.BASE_URL."superadmin_login.php");
	exit();
}

$sql= "INSERT into user (name , user_name , password , mobile, role) VALUES ('".$_POST['Name']."' , '".$_POST['User_name']."' , '".md5($_POST['Password'])."' , '".$_POST['Mobile']."','".$_POST['role']."' )";
if($db->query($sql)){
	echo "Added";
	 header('Location:'.BASE_URL.'superadmin.php');
	 exit();
}
header('Location:'.BASE_URL.'superadmin.php');
exit();
?>