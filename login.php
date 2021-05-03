<?php
include 'url.php';
session_start();
include 'user_auth.php';

if(isLoggedIn()){
  header('Location:'.BASE_URL.'admin.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width-device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <title>SAN login system</title>

 <style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1; }

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

input[type=submit]:hover {
  opacity: 0.8;
}
.container {
  padding: 16px;
}
/*body{
  background-color: teal;
}*/

</style>
</head>
<body>
 <div class="jumbotron">
	<div class="container">
     <h2><b>Login System</b></h2>
     <form action="do_login.php" method="post">
     <label for="username"><legend><b><i>Username</i></b></legend></label>
     <input type="text" name="User_name" placeholder="Enter your username" required>
     <label for="password"><legend><b><i>Password</i></b></legend></label>
     <input type="password" name="Password" placeholder="Enter your password" required>
     <input type="submit" name="submit" value="Login">
    </form> 
    </div>
 </div>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>


    



