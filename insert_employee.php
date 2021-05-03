<?php
include 'url.php';
session_start();
include("config.php");
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}
// print_r($_POST);

$sql = "INSERT INTO employeedata(Firstname,Lastname,Address,Department,Designation,Emp_ID,DOB,Mobile,Emergency,Blood_group,Dateofissue,Dateofexpiry) VALUES('".$_POST['firstname']."','".$_POST['lastname']."', '".$_POST['Address']."', '".$_POST['department']."','".$_POST['designation']."','".$_POST['employeeid']."','".$_POST['dateofbirth']."',".$_POST['mobile'].",".$_POST['contactnumber'].",'".$_POST['bloodgroup']."','".$_POST['dateofissue']."','".$_POST['dateofexpiry']."')";

if($db->query($sql)){
	echo "Added";
}

else echo "Insert Failed!";
header('Location:'.BASE_URL.'admin.php');
?>