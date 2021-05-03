<?php
include 'url.php';
include 'config.php';
session_start();
include 'user_auth.php';

if(!isSuperAdminLoggedIn()){
    header('Location:'.BASE_URL."superadmin_login.php");
    exit();
  }

$sql = "SELECT * FROM restrictions";
$result = $db->query($sql);
if($result->num_rows==0){
  header('Location:'.BASE_URL."superadmin");
  exit();
}
$data = array();
while($row = $result->fetch_assoc())  {
  $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-widht, initial-scale=1.0">
    <title>User registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <style>
 	form {border: 3px solid #f1f1f1; }
    input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
input[type=text], input[type=number] , input[type=password] {
  width: 100%;
  padding: 15px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=submit]:hover {
  opacity: 0.8;
}
.container {
  padding: 16px;
}
</style>
</head>
<body>
  <!-- <a href="superadmin.php"><button type="submit">Home</button></a> -->
	<div class="container">
	<h1><b><i>Register User</i></b></h1></div>
	<div class="jumbotron">
	 <div class="container">
	  <form action="insert_user.php" method="post">
	     <label for="name">Name</label>
	     <input type="text" name="Name" placeholder="Name" required>
       <label for="user_name">Username</label>
       <input type="text" name="User_name" placeholder="Username" required>
       <label for="password">Password</label>
       <input type="password" name="Password" placeholder="Password" required>
       <label for="Mobile">Mobile</label>
       <input type="number" name="Mobile" placeholder="Mobile" required>
       <select class="form-control" name="role">
         <?php foreach ($data as $role):?>
          <option value="<?php echo $role['role_name']?>"><?php echo $role['role_name']?></option>
         <?php endforeach;?>
       </select>
       <input type="submit" name="submit" value="Register">
      </form>
     </div>
    </div>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>


