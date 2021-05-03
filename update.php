<?php
include 'url.php';
session_start();
require 'config.php';
include 'user_auth.php';

if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if (isset($_POST['update']))
{
	$user_id=$_POST['User_id'];

    $query= ("UPDATE employeedata SET Firstname='".$_POST['Firstname']."', Lastname='".$_POST['Lastname']."',Department='".$_POST['Department']."', Designation='".$_POST['Designation']."',Emp_ID=".$_POST['Emp_ID'].", DOB='".$_POST['DOB']."',Mobile=".$_POST['Mobile'].", Emergency=".$_POST['Emergency_number'].",Blood_group='".$_POST['Bloodgroup']."', Dateofissue='".$_POST['Dateofissue']."',Dateofexpiry='".$_POST['Dateofexpiry']."' WHERE user_id = ".$_POST['user_id']);
    // echo $query;
    $query_run = mysqli_query($connection,$query);

    if($query_run){
    	echo'<script type="text/javascript"> alert("Data updated")</script>';
    }
    else{
    	echo'<script type="text/javascript"> alert("Data not updated")</script>';
    }
    header('location:'.BASE_URL.'admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-width", initial-scale=1.0>
	<title>Form updated page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body> <br><hr>
	<a href="admin.php"><button type="submit" name="submit">Home</button></a>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
