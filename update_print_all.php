<?php
	
	include 'url.php';
	session_start();
	require 'config.php';
	include 'user_auth.php';

	if(!isLoggedIn()){
	    header('Location:'.BASE_URL.'login.php');
	    exit();
	}

	$sql = "SELECT * FROM employeedata WHERE printed=0";
	$result = $db->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
		$data = array();
	  while($row = $result->fetch_assoc()) {
	    $data[]=$row;// data[i] = row
	  }
	} 
	else {
	  $data = false;
	} 
	
	if ($data)
	{
		foreach($data as $user){
			$query= ("UPDATE employeedata SET printed=1 WHERE user_id = ".$user['user_id']);
		    // echo $query;
		    $query_run = mysqli_query($connection,$query);	
		}
		echo("<script>alert('Printed Successfully!')</script>");
	    header('location:'.BASE_URL.'admin.php');
	    exit();
	}
?>