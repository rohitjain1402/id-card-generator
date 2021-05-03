<?php
include 'url.php';
include 'config.php';
include 'user_auth.php';
session_start();
if (isset($_POST['Submit'])) {

        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
//         $result = $db->query("SELECT password FROM user WHERE 
// user_name='$user_name'");
        // if(!$result)
        // {
        // echo "The username you entered does not exist";
        // }
        // if($password!= mysqli_result($result, 0))
        // {
        // echo "You entered an incorrect password";
        // }
        $result=false;
        if($newpassword==$confirmnewpassword)
        $result=$db->query("UPDATE user SET password='".md5($_POST['newpassword'])."' where id ='".$_POST['id']."' ");
        if($result)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
   }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-width , initial-scale=1.0">
	<title>Change Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
 <form action="change_password.php" method="post">
	<!-- <tr height="50">
     <td>Username :</td>
     <td><input type="text" name="User_name"></td>
    </tr>
    <tr height="50">
     <td>Password :</td>
     <td><input type="password" name="Password"></td>
    </tr> -->
    <tr height="50">
     <td><input type="hidden" name="id" value="<?php echo($_GET ['user_id'])?>"></td>
    </tr>
	<tr height="50">
     <td>New Password :</td>
     <td><input type="password" name="newpassword" required=""></td>
    </tr>
    <tr height="50">
     <td>Confirm Password :</td>
     <td><input type="password" name="confirmnewpassword" required=""></td>
    </tr>
    <tr height="50">
     <td><input type="submit" name="Submit" value="Change Password" /></td>
    </tr>
 </form>











    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

