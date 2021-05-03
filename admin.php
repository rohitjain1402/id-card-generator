<?php
include 'url.php';

session_start();
include 'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
	header('Location:'.BASE_URL.'login.php');
	exit();
}

// print_r($_SESSION);

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-width , initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- <link rel="stylesheet" type="text/css" href="admin.css"> -->
	<title>Welcome to Admin panel</title>

<style>  
.dropbtn {  
    background-color: lightgrey;  
    color: black;  
    transition:1s;
    padding: 10px;  
    font-size: 18px;
    border:0px;  
}  
.dropdown {  
    display: inline-block;  
    position: relative  
}  
.dropdown-content {  
    position: absolute;  
    background-color: lightgrey;  
    min-width: 200px;  
    display: none;  
    z-index: 1;  
}  
.dropdown-content a {  
    color: black;  
    padding: 12px 16px;  
    text-decoration: none;  
    display: block;  
}  
.dropdown-content a:hover {  
    background-color: orange;  
}  
.dropdown:hover .dropdown-content {  
    display: block;  
}  
.dropdown:hover .dropbtn {  
    background-color: grey;  
}  
.sidebar {
  margin: 0;
  padding: 0;
  /*width: 200px;*/
  background-color: #f1f1f1;
  /*position: fixed;*/
  height: 100%;
  overflow: auto;
}
.sidebar a.active {
  background-color: black;
  color: white;}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
 
#employeedata {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employeedata th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employeedata tr:nth-child(even){background-color: #f2f2f2;}

#employeedata tr:hover {background-color: #ddd;}

#employeedata th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#employeedata td{
  /*margin: 10px;*/
  padding: 5px;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
/*.topbar{
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  margin: 10px;
  padding: 20px;
  text-decoration: none;
}*/
.topbar ul{
	list-style-type: none;
}
.topbar li{
	display: inline-block;
}
.topbar li>a{
	transition:1s;
	padding:10px;
	text-decoration: none;
	color:gray;
}
.topbar li>a:hover{
	transition:1s;
	background-color:black;
	color:white;
}
</style>
  

</head>
<body>
  <div class="topbar">
  	<ul>
  		<li>
  			<a href="">Home</a>			
  		</li>
  		<li>
  			<a href="logout.php">Logout</a>
  		</li>
  		<li>
  			<div class="dropdown">
			    <button class="dropbtn">Menu </button>
			    <div class="dropdown-content">
            <?php if($_SESSION['user']['role']['add_emp_data']):?>
			      <a href="addemployee.php">Add Employee</a>
            <?php endif;?>

            <?php if($_SESSION['user']['role']['print_id_cards']):?>
			      <a href="printall.php">Print All</a>
            <?php endif;?>


            <?php if($_SESSION['user']['role']['import_from_excel']):?>
			      <a href="bulk.php">Bulk Upload</a>
            <?php endif;?>

            <?php if($_SESSION['user']['role']['generate_qr_code']):?>
			      <a href="gen_all_qrcodes.php">Generate all QRCodes</a>
            <?php endif;?>
			      <!-- <a href="">View Employee</a> -->
			    </div>
			  </div> 
  		</li>
  	</ul>
  </div>
  <?php if($_SESSION['user']['role']['search_data']):?>
  <form action="search.php" method="post">
    <input type="text" class="col-6 form-control" name="id" placeholder="search"/>
    <input type="submit" class="btn btn-primary" name="search" value="Search Data"/>
    </form>
  <?php endif;?>
</div>
   <hr>
   <div style="overflow-x:auto;">
    <?php if($_SESSION['user']['role']['read_emp_data']):?>
	<table id="employeedata">
	 <tr>
	  <th></th>
	  <th>User id</th>
	  <th>First name</th>
	  <th>Last name</th>
	  <th>Department</th>
	  <th>Designation(optional)</th>
	  <th>Emp ID</th>
	  <th>DOB</th>
	  <th>Mobile</th>
	  <th>Emergency number</th>
	  <th>Blood group</th>
	  <th>Date of issue</th>
	  <th>Date of expiry</th>
    <th>Generate qrcode</th>
	  <th>Print</th>
	  <th>Edit</th>
	  <th>Delete</th>
    <th>Image</th>
	 </tr>
	 <?php if($data):?>
	 	<?php foreach($data as $user):?>
	 		<tr>
	 			<td><img src="<?= $user['Filename']; ?>" style="width:100px;"></td>
	 			<td><?= $user['user_id']; ?></td>
	 			<td><?= $user['Firstname']; ?></td>
	 			<td><?= $user['Lastname']; ?></td>
	 			<td><?= $user['Department']; ?></td>
	 			<td><?= $user['Designation']; ?></td>
	 			<td><?= $user['Emp_ID']; ?></td>
	 			<td><?= $user['DOB']; ?></td>
	 			<td><?= $user['Mobile']; ?></td>
	 			<td><?= $user['Emergency']; ?></td>
	 			<td><?= $user['Blood_group']; ?></td>
	 			<td><?= $user['Dateofissue']; ?></td>
	 			<td><?= $user['Dateofexpiry']; ?></td>

        <?php if($_SESSION['user']['role']['generate_qr_code']):?>
        <td><a href="qrgenerate1.php?user_id=<?= $user['user_id']?>">Generate qrcode</a></td>
        <?php else:?>
          <td><a class="btn disabled">Generate qrcode</a></td>
        <?php endif;?>

        <?php if($_SESSION['user']['role']['print_id_cards']):?>
        <td><a class="btn btn-primary" href="print.php?user_id=<?= $user['user_id']?>">Print</a></td>
        <?php else:?>
          <td><a class="btn btn-primary disabled">Print</a></td>
        <?php endif;?>


        <?php if($_SESSION['user']['role']['edit_emp_data']):?>
        <td><a class="btn btn-success" href="edit.php?User_id=<?= $user['user_id']?>">Edit</a></td>
        <?php else:?>
          <td><a class="btn btn-success disabled">Edit</a></td>
        <?php endif;?>
        
        <?php if($_SESSION['user']['role']['delete_emp_data']):?>
        <td><a class="btn btn-danger" href="delete.php?user_id=<?=$user['user_id']?>">Delete</a></td>
        <?php else:?>
          <td><a class="btn btn-danger disabled">Delete</a></td>
        <?php endif;?>

        <td><a href="image.php?user_id=<?= $user['user_id']?>">Image</a></td>
        
        <td><img src="<?= $user['qr_file']?>"></td>
	 		
      </tr>
	 	<?php endforeach;?>
	 <?php endif;?>
    </table>
    <?php else:?>
      <h3>Reading Employee Data Is Restricted !!!</h3>
    <?php endif;?>
   </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   
</body>
</html>