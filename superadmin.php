<?php
	session_start();
	include_once 'config.php';
	include_once 'url.php';
	include_once 'user_auth.php';

	if(!isSuperAdminLoggedIn()){
		header('Location:'.BASE_URL."superadmin_login.php");
		exit();
	}
	$sql = "SELECT * from user";
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
#userdata {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#userdata th {
  border: 1px solid #ddd;
  padding: 8px;
}

#userdata tr:nth-child(even){background-color: #f2f2f2;}

#userdata tr:hover {background-color: #ddd;}

#userdata th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#userdata td{
  /*margin: 10px;*/
  padding: 5px;
}		

</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row super-admin-navbar">
			<a class="btn btn-primary" href="addrole.php">Add Role</a>
			<a class="btn btn-primary" href="add_user.php">Add User</a>
			<a class="btn btn-primary" href="">Show Activity Logs</a>
			<a class="btn btn-primary" href="">Show Users</a>
			<a class="btn btn-primary" href="">Show Roles</a>
			<a class="btn btn-warning" href="logout.php">Log Out</a>
		</div>
	</div>
    <br>
	<div style="overflow-x:auto;">
	<table id="userdata">
	 <tr>
	  <th>id</th>
	  <th>Name</th>
	  <th>User_name</th>
	  <!-- <th>Password</th> -->
	  <th>Mobile</th>
	 </tr>
	 <?php if($data):?>
	 	<?php foreach($data as $users):?>
	 		<tr>
	 		
	 			<td><?= $users['id']; ?></td>
	 			<td><?= $users['name']; ?></td>
	 			<td><?= $users['user_name']; ?></td>
                <!-- <td></td> -->
	 			<!-- <td><?= $users['password']; ?></td>  -->
	 			<td><?= $users['mobile']; ?></td>
	 			<td><a class="btn btn-primary" href="change_password.php?user_id=<?= $users['id']?>">Change Password</a></td>
	 			
	 		</tr>
	 	<?php endforeach;?>
	 <?php endif;?>
    </table>
   </div>
</body>
</html>