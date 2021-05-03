<?php
include 'url.php';
session_start();
include'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if(!$_SESSION['user']['role']['edit_emp_data']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

$user_id = $_GET['User_id']; 

$results = mysqli_query($connection,"select * from employeedata where user_id = $user_id"); 

$row = mysqli_fetch_assoc($results);
 
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <link href="style.css" type="text/css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<a class="btn btn-warning" href="admin.php">Admin Home</a>
<div>
	<form action="update.php" method="post">
	<div class="">
		<div class="row">
			<div class="col-1">
				<label>First Name:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Firstname']; ?>" name="Firstname">
			</div>
			<div class="col-1">
				<label>Last name:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Lastname']; ?>" name="Lastname">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<label>Department:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Department']; ?>" name="Department">
			</div>
			<div class="col-1">
				<label>Designation:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Designation']; ?>" name="Designation">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<label>Emp ID :</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Emp_ID']; ?>" name="Emp_ID">
			</div>
			<div class="col-1">
				<label>DOB :</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['DOB']; ?>" name="DOB">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<label>Mobile :</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Mobile']; ?>" name="Mobile">
			</div>
			<div class="col-1">
				<label>Emergency number :</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Emergency']; ?>" name="Emergency_number">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<label>Blood group:</label>	
			</div>
			<div class="col-3">
				 <input class="form-control" type="text" value="<?php echo $row['Blood_group']; ?>" name="Bloodgroup">
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<label>Date of issue:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Dateofissue']; ?>" name="Dateofissue">
			</div>
			<div class="col-1">
				<label>Date of expiry :</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text" value="<?php echo $row['Dateofexpiry']; ?>" name="Dateofexpiry">
			</div>
		</div>
		
	</div>
	<input type="hidden" name="user_id" value="<?= $user_id?>">
    <input class="btn btn-success" type="submit" name="update" value="Update Data"></input>
    </form>

</div>
</body>
</html>

