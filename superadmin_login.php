<?php
	session_start();
	include_once 'config.php';
	include_once 'url.php';
	include_once 'user_auth.php';

	if(isSuperAdminLoggedIn()){
		header('Location:'.BASE_URL."superadmin.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-width , initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="admin.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Welcome to Admin panel</title>
	<style>
		form{
			background-color:lightgrey;
			padding:10px;
		}
		form div{
			display:flex;
			justify-content:center;
		}
		form *{
			margin:10px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<form class="" action="superadmin_do_login.php" method="post">
			<div class="form-group col-6">
				<input type="text" class="form-control" name="user_id" placeholder="Super Admin ID">
				<input type="password" class="form-control" name="password" placeholder="Password">
				<input type="submit" class="btn btn-primary" value="Log In">
			</div>
		</form>	
	</div>
</body>
</html>