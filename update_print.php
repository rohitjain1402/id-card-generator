<?php
	
	include 'url.php';
	session_start();
	require 'config.php';
	include 'user_auth.php';

	if(!isLoggedIn()){
	    header('Location:'.BASE_URL.'login.php');
	    exit();
	}

	if (isset($_GET['user_id']))
	{
		$user_id=$_POST['User_id'];

	    $query= ("UPDATE employeedata SET printed=1,print_on_date = CURRENT_TIMESTAMP() WHERE user_id = ".$_GET['user_id']);
	    // echo $query;
	    $query_run = mysqli_query($connection,$query);

	    if($query_run){
	    	echo'<script type="text/javascript"> alert("Printed Successfully!")</script>';
	    }
	    else{
	    	echo'<script type="text/javascript"> alert("Print Failure!!!!")</script>';
	    }
	    header('location:'.BASE_URL.'admin.php');
	    exit();
	}
?>